<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{

	protected $table = 'produk';

    protected $fillable = [
    	'judul', 'slug', 'berat', 'deskripsi', 'harga', 'stok_id', 'gambar_id'	
    ];

    public function user()
    {
    	return $this->belongsToMany(\App\Models\User::class, 'user_produk');
    }

    public function stok()
    {
    	return $this->belongsTo(\App\Models\Stok::class , 'stok');
    }

    public function gambar()
    {
    	return $this->belongsTo(\App\Models\Gambar::class, 'gambar');
    }

    public function grosir()
    {
    	return $this->hasMany(\App\Models\Grosir::class, 'grosir');
    }

    public function tag()
    {
    	return $this->belongsToMany(\App\Models\Tag::class, 'produk_tag');
    }

    public function kategori()
    {
    	return $this->belongsToMany(\App\Models\Kategori::class, 'produk_kategori');
    }

    public function brand()
    {
    	return $this->belongsToMany(\App\Models\Brand::class, 'produk_brand');
    }

    public function popular()
    {
    	return $this->belongsToMany(\App\Models\IpAddress::class, 'popular');
    }

    public function transaksi()
    {
        return $this->belongsToMany(\App\Models\Transaksi::class, 'transaksi');
    }

}
