<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repository\CartRepository;
use App\Models\Produk;

class CartController extends Controller
{
    private $cart;
    private $produk;
    private $back;

    public function __construct(CartRepository $cart, Produk $produk)
    {
        $this->cart = $cart;
        $this->produk = $produk;
        $this->back = redirect( url()->previous() );
    }

    public function index()
    {
        $carts = $this->cart->getContent('belanja');
        $produk = $this->produk->whereHas('stok', function($query) {
                    $query->where('jumlah', '>', 0);
                })->paginate(3);

        return view('home', compact('produk', 'carts'));
    }
    
    public function tambah(Request $request)
    {
        $id = $request->get('config_id');
        $instance = $request->get('type_cart');

    	if($this->cart->isCart($instance)) {
    		$produk = $this->produk->find($id);
            $cart = $this->cart->getCartById($instance, $id);
            $jumlah = $produk->stok->jumlah;
    		
            if(($cart && $jumlah > $cart->qty && ($cart->qty + $request->get('jumlah')) <= $jumlah ) || ! $cart) {
				$this->cart->add($instance, $request);  				
    		}

    	} else {
            $this->cart->add($instance, $request);
		}

    	return $this->back;
    }

    public function hapus($rowId)
    {
    	$this->cart->remove(
            request()->get('type_cart'), 
            $rowId
        );

    	return $this->back;
    }
}
