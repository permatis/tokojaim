<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
	
	protected $table = 'transaksi';

    protected $fillable = [
    	'kd_transaksi', 'nomor_rekening', 'nama_bank', 'status_order_id'	
    ];

    public function user()
    {
    	return $this->belongsTo(\App\Models\User::class, 'users');
    }

    public function statusOrder()
    {
    	return $this->belongsTo(\App\Models\StatusOrder::class, 'status_order');
    }

    public function produk()
    {
        return $this->belongsToMany(\App\Models\Produk::class, 'produk_transaksi');
    }

}
