<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{

	protected $table = 'produk';

    protected $fillable = [
    	'judul', 'slug', 'berat', 'deskripsi', 'harga', 'stok'
    ];

    public function setJudulAttribute($value)
    {
        $this->attributes['judul'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }

    public function user()
    {
    	return $this->belongsToMany(\App\Models\User::class, 'user_produk');
    }

    public function gambar()
    {
    	return $this->belongsToMany(\App\Models\Gambar::class, 'produk_gambar');
    }

    public function tag()
    {
        return $this->belongsToMany(\App\Models\Tag::class, 'produk_tag');
    }

    public function kategori()
    {
        return $this->belongsToMany(\App\Models\Kategori::class, 'produk_kategori')
            ->withPivot('kategori_id');
    }

    public function grosir()
    {
    	return $this->hasMany(\App\Models\Grosir::class, 'grosir');
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
        return $this->belongsToMany(\App\Models\Transaksi::class, 'produk_transaksi')
            ->withPivot(['jumlah', 'subtotal', 'produk_id', 'transaksi_id', 'created_at', 'updated_at']);
    }
 
    public function favorit()
    {
        return $this->belongsToMany(\App\Models\Produk::class, 'favorit');
    }

    protected static function boot() 
    {
        parent::boot();

        static::deleting(function($produk) { // before delete() method call this
             $produk->gambar()->delete();
             $produk->tag()->delete();
             $produk->kategori()->delete();
             // do the rest of the cleanup...
        });
    }

}
