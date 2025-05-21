<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SessionUserAccountMW
{
    public function handle(Request $request, Closure $next)
    {
        if (!Session::has('user')) {
            return redirect()->route('login')->with('message', 'Please log in to continue.');
        }

        return $next($request);
    }
}
