<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

	protected $table = 'profile';

	protected $fillable = [
    	'jenis_kelamin', 'agama', 'tempat_lahir', 'tanggal_lahir', 'telepon', 'user_id', 'alamat_id'	
    ];

    public function user()
    {
    	return $this->belongsTo(\App\Models\User::class, 'users');
    }

    public function alamat()
    {
    	return $this->belongsTo(\App\Models\Alamat::class, 'alamat');
    }
    
}
