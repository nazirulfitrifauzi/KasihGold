<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PassScreening
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
        $complete = false;

        if ($request->user()->screen == 2) {
            if (Auth::check()) {
                Auth::logout();
            }
            return redirect()->route('login')->with('error', 'This account does not pass the screening process.');
        }

        if (auth()->user()->profile_c == 1) {
            $complete = true;
        }

        if ($complete == false) {
            session()->flash('warning');
            session()->flash('title', 'Attention!');
            session()->flash('message', 'You need to complete your user profile in order to use this system.');
            return redirect('profile');
        }

        return $next($request);
    }
}
