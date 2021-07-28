<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifiedOTP
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
        if ($request->user()->otp_verified_at == NULL) {
            // Auth::logout();
            session()->flash('warning');
            session()->flash('title', 'Attention!');
            session()->flash('message', 'Please verify your OTP first.');

            return redirect()->route('verifyOTP');
        }

        return $next($request);
    }
}
