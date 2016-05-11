<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
	
	protected $table = 'alamat';

    protected $fillable = [
    	'kabupaten', 'alamat', 'kode_pos', 'provinsi_id'
    ];

    public function profile()
    {
    	return $this->hasMany(\App\Models\Profile::class, 'profile');
    }

    public function provinsi()
    {
    	return $this->belongsTo(\App\Models\Provinsi::class, 'provinsi');
    }

}
