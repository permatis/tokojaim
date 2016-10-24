<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repository\CartRepository;
use App\Repository\ProdukRepository;
use App\Models\Kategori;

class FrontEndController extends Controller
{
    private $cart;
    private $produk;
    private $back;
    private $kategori;

    public function __construct(CartRepository $cart,
                                ProdukRepository $produk,
                                Kategori $kategori)
    {
        $this->cart = $cart;
        $this->produk = $produk;
        $this->back = redirect( url()->previous() );
        $this->kategori = $kategori;
    }

    /**
     * Halaman depan
     * @return array
     */
    public function index()
    {
        $produk = $this->produk->get();

        return view('themes/shoppe/index', compact('produk'));
    }

    /**
     * Menampilkan produk berdasarkan kategori
     * @param  string $parent Parent kategori
     * @param  string $child  Child kategori
     * @return array
     */
    public function kategori($parent, $child = null)
    {
        $kat = $this->kategori->where('nama', str_slug($parent, '-'))->first();

        $kategori = ($child) ?
                    $this->kategori->where('nama', str_slug($child, '-'))
                        ->where('parent_id', $kat->id)->first() :
                    $kat;

        if(! $kategori )
        {
            return abort(404);
        }

        $produks = $this->produk->getProdukByKategori($kategori);

        return view('frontend.kategori', compact('produks'));
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

        return ($produk) ?
            view('frontend.detail-produk', compact('produk')) :
            abort(404);
    }

    /**
     * Tahap-tahap melakukan checkout
     * @return array
     */
    public function checkout()
    {
        if(count(request()->get('step')) > 0)
        {
            dd(request()->get('step'));
        }

        return view('frontend.keranjang');
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
