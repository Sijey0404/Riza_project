<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
       // Define the fields that are mass assignable
       protected $fillable = [
        "studentid",
        "fname",
        "mname",
        "lname",
        "address",
        "contactno"
    ];
}
