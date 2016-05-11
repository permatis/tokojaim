<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{

	protected $table = 'provinsi';

	protected $fillable = [
    	'nama'
    ];

    public function alamat()
    {
    	return $this->hasMany(\App\Models\Alamat::class, 'alamat');
    }

}
