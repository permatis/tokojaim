<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $fillable = [
    	'name', 'description'
    ];	

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = str_slug($value, '-');
    }

    public function users()
    {
    	return $this->belongsTo(\App\Models\User::class, 'role_user');
    }
}
