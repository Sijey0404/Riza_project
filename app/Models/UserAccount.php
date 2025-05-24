<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class UserAccount extends Authenticatable
{
    protected $fillable = [
        'username',
        'password', 
        'defaultpassword',
        'useraccount_id',
        'status'
    ];

    protected $hidden = ['password', 'defaultpassword'];
    
    /**
     * Define the relationship with Student
     */
    public function student()
    {
        return $this->belongsTo(Student::class, 'useraccount_id');
    }
}

