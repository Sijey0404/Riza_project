<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAccount;

class UserController extends Controller
{
    public function login(Request $request){
        echo $username = $request->input("username");
        echo $password = $request->input("password");

        $userAccount = UserAccount::
        where("username",$username)
        ->where("password",$password)
        ->value("username");
        if($userAccount==""){
            return view('loginForm');
        }else{
            return redirect("/student");
        }
        return view('loginForm');
    }

    public function viewusers() {
        $userAccount = UserAccount::where("username", "admin")
        // ->first();
        ->value("username");
        return $userAccount;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
