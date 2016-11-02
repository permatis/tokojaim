<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccessToken extends Model
{

    protected $table = 'access_token';

    protected $fillable = [
        'tk_facebook', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
