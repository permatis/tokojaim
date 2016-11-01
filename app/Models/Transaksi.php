<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{

	protected $table = 'transaksi';

    protected $fillable = [
    	'kd_transaksi', 'total_pembayaran', 'user_id', 'status_order_id'
    ];

    public function user()
    {
    	return $this->belongsTo(\App\Models\User::class);
    }

    public function statusOrder()
    {
    	return $this->belongsTo(\App\Models\StatusOrder::class);
    }

    public function produk()
    {
        return $this->belongsToMany(\App\Models\Produk::class, 'produk_transaksi')
            ->withPivot(['jumlah', 'subtotal', 'produk_id', 'transaksi_id', 'created_at', 'updated_at']);
    }

    public function konfirmasi()
    {
        return $this->hasMany(\App\MOdels\Konfirmasi::class);
    }
}
