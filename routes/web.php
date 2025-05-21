<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ManageStudentController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;


Route::get('/viewuser',[UserController::class,'viewusers']);


Route::get('/login',[UserController::class,'login']);

Route::get('/sessionMessage',function(){
    // session(['message'=>'hello world']);
    Session::put('message','hello laravel');
    // echo $sessionmsg = session('message');
    echo Session::get('message');
});

// Route::get('/encryption', function () {
//     $encrypted = Crypt::encryptString('Secret Message');
//     echo $encrypted;
//     echo"\n";
//     $decrypted = Crypt::decryptString($encrypted);
//     echo $decrypted;
// });


// Route::get('/hash',function(){
//     $password = Hash::make('secretpassword');
//     echo $password;

//     if(Hash::check('secretpassword',$password)){
//         echo"Password matched";
//     }else{
//         echo"Password did not matched";
//     }

// });

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('mwheaders')->group(function(){

    Route::get('/try/{message}',
    [RedirectController::class,'redirectme'])
    ->name("redirectRoute");
    
    Route::get('/showsomething',[RedirectController::class,'showsomething']);
    
    Route::get('/redirectme',function(){
        return redirect()
        ->route("redirectRoute",["message"=>"Another Message!"]);
        return redirect()->action("RedirectController@showsomething");
    });
    
    Route::resource('/student',ManageStudentController::class);
    // ->Middleware('maintenance');
    
    Route::get('/students', [PagesController::class, 'index'])->name('students.index');
    
    Route::get('/about-us', function () {
        return view('about-us');
    });
    
    Route::get('/contact-us', function () {
        return view('contact-us');
    });
    
    Route::get('/profile', function () {
        return view('profile');
    });
    Route::get('/conditional/{grade?}', [PagesController::class, 'conditional'])->name('conditional');
Route::get('/pattern', [PagesController::class, 'pattern'])->name('pattern');
    Route::get('/patternn/{rows?}', function ($rows=5) {
        return view('pattern', compact('rows'));
    })->name('pattern');
});

Route::get('/maintenance',[PagesController::class,'maintenance']);

// Route::get('/try/{message}',
// [RedirectController::class,'redirectme'])
// ->name("redirectRoute");

// Route::get('/showsomething',[RedirectController::class,'showsomething']);

// Route::get('/redirectme',function(){
//     return redirect()
//     ->route("redirectRoute",["message"=>"Another Message!"]);
//     return redirect()->action("RedirectController@showsomething");
// });

// Route::resource('/student',ManageStudentController::class);

// Route::get('/students', [PagesController::class, 'index'])->name('students.index');

// Route::get('/about-us', function () {
//     return view('about-us');
// });

// Route::get('/contact-us', function () {
//     return view('contact-us');
// });

// Route::get('/profile', function () {
//     return view('profile');
// });
// Route::get('/conditional/{grade?}', [PagesController::class, 'conditional'])->name('conditional');
// Route::get('/pattern', [PagesController::class, 'pattern'])->name('pattern');
//     Route::get('/patternn/{rows?}', function ($rows=5) {
//         return view('pattern', compact('rows'));
//     })->name('pattern');