<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Konfirmasi extends Model
{
    protected $table = 'konfirmasi';
    
    protected $fillable = [
    	'nama_pengirim', 'jumlah', 'rekening_pengirim', 'rekening_toko', 'metode_transfer', 'tgl_transaksi' ,'transaksi_id', 'gambar_id'
    ];

    public $timestamps = false;

    public function transaksi()
    {
    	return $this->belongsTo(\App\Models\Transaksi::class);
    }

    public function gambar()
    {
    	return $this->belongsTo(\App\Models\Gambar::class);
    }
}
