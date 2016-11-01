<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AlamatRequest;
use App\Http\Requests\KonfirmasiPembayaranRequest;
use App\Repository\CartRepository;
use App\Repository\ProdukRepository;
use App\Repository\ImageRepository;
use App\Models\Kategori;
use App\Models\Alamat;
use App\Models\Transaksi;
use App\Models\Konfirmasi;

class FrontEndController extends Controller
{
    private $cart;
    private $produk;
    private $back;
    private $kategori;
    private $alamat;
    private $transaksi;
    private $konfirmasi;
    private $image;

    public function __construct(
        CartRepository $cart,
        ProdukRepository $produk,
        Kategori $kategori,
        Alamat $alamat,
        Transaksi $transaksi,
        Konfirmasi $konfirmasi,
        ImageRepository $image
    )
    {
        $this->cart = $cart;
        $this->produk = $produk;
        $this->back = redirect( url()->previous() );
        $this->kategori = $kategori;
        $this->alamat = $alamat;
        $this->transaksi = $transaksi;
        $this->konfirmasi = $konfirmasi;
        $this->image = $image;
    }

    /**
     * Halaman depan
     * @return array
     */
    public function index()
    {
        $produk = $this->produk->limit(4);
        $featured = $this->produk->random(4);

        return view('themes/shoppe/index', compact('produk', 'featured'));
    }
    
    // public function carikategori($nama)
    // {
    //     $produk = $this->produk->get();

    //     return view('themes/shoppe/index', compact('produk'));
    // }



    /**
     * Menampilkan produk berdasarkan kategori
     * @param  string $parent Parent kategori
     * @param  string $child  Child kategori
     * @return array
     */
    public function kategori($parent, $child = null)
    {
        $parent = str_replace('-', ' ', $parent);
        $child = str_replace('-', ' ', $child);

        $kat = $this->kategori->where('nama', $parent)->first();

        $kategori = ($child) ?
                    $this->kategori->where('nama', $child)
                        ->where('parent_id', $kat->id)->first() :
                    $kat;

        if(! $kategori )
        {
            return abort(404);
        }

        $produks = $this->produk->getProdukByKategori($kategori);

        return view('themes.shoppe.kategori-produk', compact('produks'));
    }

    /**
     * Menampilkan hasil pencarian produk
     */
    public function search()
    {
        $search = request()->get('search');
        $produk = '';
        $keywords = ($search['keywords']) ? $search['keywords'] : '';

        if($search) {
            if(count($keywords) > 0) {
                $produk = $this->produk->search($keywords);
            }
        }

        if(count($produk) > 0) {
            // show error message
        }

        $produks = ( count($produk) > 0 && $keywords ) ? $produk : $this->produk->get();

        return view('frontend.produks', compact('produks', 'keywords'));
    }

    /**
     * Menampilkan detail produk
     * @param  string $slug produk url
     * @return array
     */
    public function detail($slug)
    {
        $produk = $this->produk->find($slug, 'slug');

        $parent_id = $produk->kategori[0]->parent_id;
        if($parent_id) { 
            $parent = $this->kategori->find($parent_id);
            $kategori_link = strtolower(url('kategori/'.$parent->nama.'/'.$produk->kategori[0]->nama));
        } else {
            $kategori_link = strtolower(url('kategori/'.$produk->kategori[0]->nama));
        }

        return ($produk) ?
            view('themes.shoppe.detail-produk', compact('produk', 'kategori_link')) :
            abort(404);
    }

    public function checkout(AlamatRequest $request)
    {
        $this->alamat->create(
            array_merge($request->all(), [ 'user_id' => auth()->user()->id ])
        );

        $data_transaksi = [
            'kd_transaksi'      => kode_pemesanan(7),
            'total_pembayaran'  => array_sum(array_pluck(carts(), 'subtotal')),
            'user_id'           => auth()->user()->id,
            'status_order_id'   => 1
        ];

        $transaksi = $this->transaksi->create($data_transaksi);

        foreach(carts() as $cart) {
            $transaksi->produk()->attach( 
                $cart->id, [ 'jumlah' => $cart->qty, 'subtotal' => $cart->subtotal]
            );
        }

        return back()->with('transaksi', $transaksi);
    }

    public function konfirmasi(KonfirmasiPembayaranRequest $request)
    {
        $transaksi = $this->transaksi->where( 'kd_transaksi', $request->get('kd_pemesanan') )->first();
        $konfirmasi = $this->konfirmasi->where('transaksi_id', $transaksi->id)->first();
        $transaksi->update(['status_order_id' => 2]);

        if(count($transaksi) > 0 && $konfirmasi == null) {
            $this->image->folder = 'fileimages/konfirmasi';
            $gambar = $this->image->save($request->file('gambar'));

            $this->konfirmasi->create(
                array_merge(
                    array_except($request->all(), ['kd_pemesanan', 'gambar']),
                    [ 'transaksi_id' => $transaksi->id, 
                        'gambar_id' => $gambar->id]
                )   
            );

            $request->session()->flash('sukses', 'Konfirmasi pembayaran sukses dibuat. Pemesanan akan segera diproses.');
            return redirect('/konfirmasi_pembayaran');
        } else {
            return back()
                ->withErrors(['kd_pemesanan' => 'Kode pemesanan tidak ada.'])
                ->withInput();
        }
    }

    /**
     * Untuk menambahkan produk ke keranjang belanja
     * @param  Request $request Request dari form input produk
     * @return redirect()
     */
    public function tambah(Request $request)
    {
        $id = $request->get('config_id');
        $instance = $request->get('submit');

    	if($this->cart->isCart($instance)) {

    		$produk = $this->produk->find($id);
            $cart = $this->cart->getCartById($instance, $id);
            $jumlah = $produk->stok;

            if(($cart && $jumlah > $cart->qty && ( $cart->qty + $request->get('jumlah') ) <= $jumlah ) || ! $cart) {
				$this->cart->add($instance, $request);
    		}

    	} else {
            $this->cart->add($instance, $request);
		}

    	return $this->back;
    }

    /**
     * Untuk menghapus produk dari keranjang belanja
     * @param  string $rowId unik id
     * @return redirect()
     */
    public function hapus($rowId)
    {
    	$this->cart->remove(
            request()->get('type_cart'),
            $rowId
        );

    	return $this->back;
    }
}
