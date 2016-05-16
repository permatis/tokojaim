<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gambar extends Model
{
    
    protected $table = 'gambar';

    protected $fillable = [
    	'nama', 'file'
    ];

    public function produk()
    {
    	return $this->belongsToMany(\App\Models\Produk::class, 'produk_gambar');
    }
    
}
