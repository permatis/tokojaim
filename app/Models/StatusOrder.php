<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusOrder extends Model
{

	protected $table = 'status_order';

    protected $fillable = [
    	'nama', 'deskripsi'		
    ];

    public function transaksi()
    {
    	return $this->hasMany(\App\Models\Transaksi::class, 'transaksi');
    }

}
