<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckCustomerLogin
{
    public function handle(Request $request, Closure $next)
    {
        // Customer guard ilə login yoxlanışı
        if (!Auth::guard('customer')->check()) {
            // Login deyilsə, customer login səhifəsinə yönləndir
            return redirect()->route('customer_signin');
        }

        return $next($request);
    }
}
