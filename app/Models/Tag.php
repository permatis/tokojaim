<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    protected $fillable = [
    	'nama'
    ];

    public function produk()
    {
    	return $this->belongsToMany(\App\Models\Produk::class, 'produk_tag');
    }
    
}
