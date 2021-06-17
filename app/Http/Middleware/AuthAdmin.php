<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->isAdminKG || auth()->user()->isAdminKAP)
        {
            return $next($request);
        }
        else
        {
            return redirect()->route('home')->with('error', 'Forbidden access.');
        }
    }
}
