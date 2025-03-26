<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserApproval
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is logged in and not approved
        if (Auth::check() && !Auth::user()->approved) {
            // Log the user out and redirect them to login with an error message
            Auth::logout();
            return redirect()->route('login')->with('error', 'Your account is not approved yet.');
        }

        return $next($request);
    }
}
