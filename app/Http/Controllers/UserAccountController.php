<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAccount;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserAccountController extends Controller
{
    public function showNewUserForm() {
        return view('newUserAccount');
    }

    public function storeNewUser(Request $request) {
        $request->validate([
            'username' => 'required|unique:user_accounts',
            'defaultpassword' => 'required|min:6',
        ]);

        UserAccount::create([
            'username' => $request->username,
            'password' => Hash::make("Changepass123"),
            'defaultpassword' => "Changepass123",
        ]);

        return redirect()->back()->with('success', 'User created successfully.');
    }

    public function showLoginForm() {
        return view('login');
    }

    public function login(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = UserAccount::where('username', $request->username)->first();

        if (!$user) {
            return back()->withErrors(['error' => 'Invalid credentials']);
        }

        $validPassword = Hash::check($request->password, $user->password);
        
        if (!$validPassword) {
            return back()->withErrors(['error' => 'Invalid credentials']);
        }

        Session::put('user', $user);

        if (!empty($user->defaultpassword)) {
            return redirect()->route('updatePassword');
        }

        return redirect()->route('dashboard');
    }

    public function showUpdatePasswordForm() {
        return view('updatePassword');
    }

    public function updatePassword(Request $request) {
        $request->validate([
            'password' => 'required|min:6|confirmed',
        ]);

        $user = Session::get('user');
        $user->password = Hash::make($request->password);
        $user->defaultpassword = '';
        $user->save();

        Session::put('user', $user);

        return redirect()->route('dashboard')->with('success', 'Password updated successfully.');
    }

    public function dashboard() {
        return view('dashboard');
    }

    public function logout() {
        Session::flush();
        return redirect()->route('login')->with('message', 'Logged out successfully.');
    }
}
