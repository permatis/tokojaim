<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class CartController extends Controller
{
    
    public function tambah(Request $request)
    {
    	if(! \Cart::isEmpty()) {
    		$produk = \App\Models\Produk::find($request->get('config_id'));
    		$cart = \Cart::get($request->get('config_id'));
    		
    		if(($cart && $produk->stok->jumlah > $cart->quantity) || ! $cart) {
				\Cart::add( $this->getProduk($request) );    				
    		}

    	} else {
			\Cart::add( $this->getProduk($request) );
		}
		
    	return redirect('/');
    }

    public function hapus($id)
    {
    	\Cart::remove($id);

    	return redirect('/');
    }

    protected function getProduk($request)
    {
    	$produk = \App\Models\Produk::find($request->get('config_id'));

    	return [
    		'id'		=> $produk->id,
    		'name' 	=> $produk->judul,
    		'price'		=> $produk->harga,
    		'quantity' 	=> $request->get('jumlah'),
    		'attributes' => array()
    	];
    }
}
