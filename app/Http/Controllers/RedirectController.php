<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
    
    public function redirectme($message){
        // echo $message;
        return "This is the content of the redirect controller";
    }

    public function showsomething(){
        
        return "This is something";
    }
}


