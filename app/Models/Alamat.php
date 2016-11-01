<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
	
	protected $table = 'alamat';

    protected $fillable = [
    	'nama_lengkap', 'no_hp', 'alamat', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function profile()
    {
    	return $this->hasMany(\App\Models\Profile::class, 'profile');
    }

    public function provinsi()
    {
    	return $this->belongsTo(\App\Models\Provinsi::class, 'provinsi');
    }

}
