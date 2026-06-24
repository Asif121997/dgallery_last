<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Redirect;
use Illuminate\Support\Facades\Redirect as HttpRedirect;

class RedirectIfNotFound
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // Əgər route tapılmadısa (404)
        if ($response->status() === 404) {

            $currentUrl = url()->current(); // tam URL
            $path = '/' . ltrim($request->path(), '/'); // nisbətən URL (prefixlə birgə)

            $redirect = Redirect::where('from', $currentUrl)
                ->orWhere('from', $path)
                ->first();

            if ($redirect) {
                return HttpRedirect::to($redirect->to, 301);
            }
        }

        return $response;
    }
}
