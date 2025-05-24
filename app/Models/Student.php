<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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
        "contactno",
        "email",
        "image_path"
    ];

    /**
     * Define the relationship with UserAccount
     */
    public function userAccount()
    {
        return $this->hasOne(UserAccount::class, 'useraccount_id');
    }

    /**
     * Generate a unique student ID in the format S-YY-Count
     * where YY is the last two digits of the current year
     * and Count is the total number of students added in the current year + 1
     */
    public static function generateStudentId()
    {
        $currentYear = Carbon::now()->format('y');
        
        // Count students from current year
        $yearPrefix = "S-" . $currentYear . "-";
        
        // Count how many students already exist with this year's prefix
        $count = self::where('studentid', 'like', "S-$currentYear-%")->count();
        
        // New ID is prefix + (count + 1)
        return $yearPrefix . ($count + 1);
    }
}
