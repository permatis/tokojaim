<?php

namespace App\Repository;

use App\Models\Produk;
use App\Models\Kategori;

class ProdukRepository
{
	private $produk;
	private $kategori;

	public function __construct(Produk $produk, Kategori $kategori)
	{
		$this->produk = $produk;
		$this->kategori = $kategori;
	}

	public function get()
	{
		return $this->produk->whereHas('stok', function($query) {
				$query->where('jumlah', '!=', 0);
			})->get();
	}

	public function find($value, $key = null)
	{
		return ($key) ? $this->produk->where($key, $value)->first() :
			$this->produk->find($value);
	}

	public function search($keywords)
	{
		return $this->produk->where('judul', 'LIKE', '%'.$keywords.'%')
				->whereHas('stok', function($query) {
					$query->where('jumlah', '!=', 0);
				})->get();
	}

	public function getProdukByKategori($kategori)
	{
		return ( $kategori->parent_id == 0 ) ?
				$kategori->produk()->orWhereIn(
					'kategori_id', [ $this->getKategoriId($kategori->id) ]
				)->whereHas('stok', function($query) { 
					$query->where('jumlah', '!=', 0);
				})->get() : 
				$kategori->produk()->whereHas('stok', function($query) { 
                    $query->where('jumlah', '!=', 0);
                })->get();
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