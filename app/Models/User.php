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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($value)
    {
        if($value) $this->attributes['password'] = bcrypt($value);
    }

    public function hasRole($roles)
    {
        $this->hasRole = $this->getUserRole();

        if(is_array($roles)){
            foreach($roles as $need_role){
                if($this->checkIfUserHasRole($need_role)) {
                    return true;
                }
            }
        } else{
            return $this->checkIfUserHasRole($roles);
        }

        return false;
    }

    public function hasRoles($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }

        return !! $this->roles->intersect($role)->count();
    }

    private function getUserRole()
    {
        return $this->roles()->getResults();
    }

    private function checkIfUserHasRole($need_role)
    {
        return (strtolower($need_role)==strtolower($this->hasRole[0]->name)) ? true : false;
    }

    public function accessToken()
    {
        return $this->hasMany(\App\Models\AccessToken::class);
    }

    public function profile()
    {
        return $this->hasMany(\App\Models\Profile::class);
    }

    public function produk()
    {
        return $this->belongsToMany(\App\Models\Produk::class, 'user_produk');
    }

    public function transaksi()
    {
        return $this->hasMany(\App\Models\Transaksi::class);
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
