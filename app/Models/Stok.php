<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    
    protected $table = 'stok';

    protected $fillable = [
    	'jumlah'	
    ];

    public function produk()
    {
    	return $this->hasMany(\App\Models\Produk::class, 'produk');
    }

}
