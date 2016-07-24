<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_depan', 'nama_belakang', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile()
    {
        return $this->hasMany(\App\Models\Profile::class, 'profile');
    }

    public function produk()
    {
        return $this->belongsToMany(\App\Models\Produk::class, 'user_produk');
    }

    public function transaksi()
    {
        return $this->hasMany(\App\Models\Transaksi::class, 'transaksi');
    }

    public function favorit()
    {
        return $this->belongsToMany(\App\Models\Produk::class, 'favorit');
    }

    public function roles()
    {
        return $this->belongsToMany(\App\Models\Role::class, 'user_role');
    }

    
}
