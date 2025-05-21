<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    function contactUs() {
    return view('contact-us');
}
function aboutUs() {
    return view('about-us');
}
function profile() {
    return view('profile');
}
function conditional($grade=null) {
   
    return view('conditional') 
    
    ->with('grade',$grade);
}
public function index()
{
    $students = array(
        array("ID" => "22-SC-3101", "name" => "Mark", "age" => 14, "course" => "MD101"),
        array("ID" => "22-SC-3102", "name" => "Angeline", "age" => 15, "course" => "MD101"),
        array("ID" => "22-SC-3103", "name" => "May Marie", "age" => 18, "course" => "MD101"),
        array("ID" => "22-SC-3104", "name" => "Jenelyn", "age" => 13, "course" => "MD101"),
        array("ID" => "22-SC-3105", "name" => "Ailene", "age" => 16, "course" => "MD101"),
        array("ID" => "22-SC-3106", "name" => "Riza Mae", "age" => 13, "course" => "MD101"),
        array("ID" => "22-SC-3107", "name" => "Joel", "age" => 15, "course" => "MD101"),
        array("ID" => "22-SC-3108", "name" => "Jenyleth", "age" => 16, "course" => "MD101"),
        array("ID" => "22-SC-3109", "name" => "Roe", "age" => 15, "course" => "MD101"),
        array("ID" => "22-SC-31010", "name" => "Aries", "age" => 14, "course" => "MD101"),
    );
    
    return view('students')->with('students', $students); 
}


public function array()
{
    return view ('array');
}
public function pattern()
{
    return view ('pattern');
}
public function maintenance()
{
    return view('maintenance');
}

// public function maintenance()
// {
//     return "Sorry, The system is currently maintenance! Come back again after 30 minutes";
// }


}
