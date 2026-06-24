<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name','lastname','password','token','phone','email','address','img','type'];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
