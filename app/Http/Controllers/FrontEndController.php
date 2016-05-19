<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repository\CartRepository;
use App\Models\Produk;
use App\Models\Kategori;

class FrontEndController extends Controller
{
    private $cart;
    private $produk;
    private $back;
    private $kategori;

    public function __construct(CartRepository $cart, 
                                Produk $produk, 
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
        $carts = $this->carts();
        $produk = $this->produk->paginate(3);

        return view('frontend.home', compact('produk', 'carts'));
    }

    /**
     * Menampilkan produk berdasarkan kategori
     * @param  string $parent Parent kategori
     * @param  string $child  Child kategori
     * @return array
     */
    public function kategori($parent, $child = null)
    {
        $carts = $this->carts();
        $kat = $this->kategori->where('nama', str_slug($parent, '-'))->first();

        $kategori = ($child) ? 
                    $this->kategori->where('nama', str_slug($child, '-'))
                        ->where('parent_id', $kat->id)->first() : 
                    $kat;
        
        if(! $kategori )
        {
            return abort(404);
        }

        $produks = ( $kategori->parent_id == 0 ) ? $kategori->produk()->orWhereIn(
                        'kategori_id', [ $this->getKategoriId($kategori->id) ]
                    )->get() : $kategori->produk()->get();
        
        return view('frontend.kategori', compact('produks', 'carts'));
    }

    /**
     * Menampilkan hasil pencarian produk
     */
    public function search()
    {
        $search = request()->get('search');
        
        if($search) {
            $keywords = ($search['keywords']) ? $search['keywords'] : '';
            $produk = '';
    
            if(count($keywords) > 0) {
                $produk = $this->produk->where('judul', 'LIKE', '%'.$search['keywords'].'%')->get();
            }
        }

        if(count($produk) > 0) {
            // show error message
        }

        $produks = (count($produk) > 0) ? $produk : $this->produk->get();

        $carts = $this->carts();

        return view('frontend.produks', compact('produks', 'carts', 'keywords'));
    }

    /**
     * Menampilkan detail produk
     * @param  string $slug produk url
     * @return array
     */
    public function detail($slug)
    {
        $carts = $this->carts();
        $produk = $this->produk->where('slug', $slug)->first();

        return ($produk) ? 
            view('frontend.detail-produk', compact('produk', 'carts')) : 
            abort(404);
    }

    /**
     * Tahap-tahap melakukan checkout
     * @return array
     */
    public function checkout()
    {
        $carts = $this->carts();
        
        return view('frontend.keranjang', compact('carts'));
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
            $jumlah = $produk->stok->jumlah;
    		
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

    /**
     * Mendapatkan nilai dari keranjang belanja.
     * @return array
     */
    protected function carts()
    {
        return $this->cart->getContent('belanja');
    }

    protected function getKategoriId($parent_id)
    {
        $kategori = $this->kategori->where('parent_id', $parent_id)->get()->toArray();

        foreach ($kategori as $kat) {
            $k[] = $kat['id'];
        }

        return implode(',', $k);
    }
}
