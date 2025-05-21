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
            'password' => Hash::make($request->defaultpassword),
            'defaultpassword' => $request->defaultpassword,
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

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['error' => 'Invalid credentials']);
        }

        Session::put('user', $user);

        if ($request->password === $user->defaultpassword) {
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
