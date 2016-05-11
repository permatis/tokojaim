<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{

	protected $table = 'kategori';

	protected $fillable = [
    	'nama', 'deskripsi', 'parent_id'
    ];

    public function produk()
    {
    	return $this->belongsToMany(\App\Models\Produk::class, 'produk_kategori');
    }

}
