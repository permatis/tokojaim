<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class CartController extends Controller
{
    
    public function tambah(Request $request)
    {
    	if(count(\Cart::content()) > 0) {
            $ids = $request->get('config_id');
    		$produk = \App\Models\Produk::find($ids);
            $rowId = \Cart::search([ 'id' => (int) $ids ]);
    		$cart = \Cart::get($rowId[0]);
    		
            if(($cart && $produk->stok->jumlah > $cart->qty) || ! $cart) {
				\Cart::add( $this->getProduk($request) );    				
    		}

    	} else {
			\Cart::add( $this->getProduk($request) );
		}

    	return redirect(url()->previous());
    }

    public function hapus($rowId)
    {
    	\Cart::remove($rowId);

    	return redirect(url()->previous());
    }

    protected function getProduk($request)
    {
    	$produk = \App\Models\Produk::find($request->get('config_id'));

    	return [
    		'id'  => $produk->id,
    		'name' => $produk->judul,
            'qty' => $request->get('jumlah'),
    		'price' => $produk->harga
    	];
    }
}
