<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;

class SetLocale
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

        if (in_array($request->segment(1), ['en', 'ar'])) {

            app()->setLocale($request->segment(1));
            Session::put('lang', $request->segment(1));
            return $next($request);
        } else {

            app()->setLocale('en');
            Session::put('lang', 'en');

            return $next($request);
        }
    }
}
