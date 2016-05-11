<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grosir extends Model
{

	protected $table = 'grosir';

	protected $fillable = [
    	'min', 'max', 'harga', 'produk_id'	
    ];

    public function produk()
    {
    	return $this->belongsTo(\App\Models\Produk::class, 'produk');
    }

}
