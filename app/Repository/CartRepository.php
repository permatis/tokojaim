<?php

namespace App\Repository;

use App\Models\Produk;
use Cart;

class CartRepository
{
	private $produk;

	public function __construct(Produk $produk)
	{
		$this->produk = $produk;
	}

	public function add($instance, $request)
	{
		return Cart::instance($instance)
			->add(
				$this->getProduk($request)
			);
	}

	public function remove($instance, $rowId)
	{
		return Cart::instance($instance)->remove($rowId);
	}

	public static function destroy($instance)
	{
		return Cart::instance($instance)->destroy();
	}

	protected function getProduk($request)
    {
    	$produk = $this->produk->find($request->get('config_id'));

    	return [
    		'id'  => $produk->id,
    		'name' => $produk->judul,
            'qty' => $request->get('jumlah'),
    		'price' => $produk->harga
    	];
    }

	public function getCartById($instance, $id)
	{
		return Cart::instance($instance)
			->get(
				$this->searchRowById($instance, $id)
		);
	}

	public static function getContent($instance)
	{
		return Cart::instance($instance)->content();
	}

	public function searchRowById($instance, $id)
	{
		$row = Cart::instance($instance)->search([ 'id' => (int) $id ]);
		
		return $row[0];
	}

	public function isCart($instance)
	{
		return (count($this->getContent($instance)) > 0) ? true : false;
	}
}