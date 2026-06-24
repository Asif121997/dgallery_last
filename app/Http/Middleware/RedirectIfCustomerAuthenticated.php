<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfCustomerAuthenticated
{
    public function handle(Request $request, Closure $next, $guard = 'customer')
    {
        if (Auth::guard($guard)->check()) {
            // Əgər artıq login olubsa login səhifəsinə girməsin
            return redirect()->route('homepage');
        }

        return $next($request);
    }
}
