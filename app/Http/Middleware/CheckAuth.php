<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            // If the user is authenticated, they shouldn't access sign-in and sign-out pages
            if (Auth::guard('web')->check() && ($request->is('login-user') || $request->is('logout-user'))) {
                return redirect()->route('homepage'); // Redirect authenticated users to the cabinet page
            }
            
            // If the user is not authenticated, they shouldn't access the cabinet page
            if (!Auth::guard('web')->check() && $request->is('cabinet')) {
                return redirect()->route('homepage'); // Redirect non-authenticated users to the sign-in page
            }
            return $next($request);
        }else{
            return redirect()->route('homepage'); // Redirect non-authenticated users to the sign-in page
            return $next($request);
        }
    }
}
