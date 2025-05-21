<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class UserAccount extends Authenticatable
{
    protected $fillable = ['username', 'password', 'defaultpassword'];

    protected $hidden = ['password', 'defaultpassword'];
}

