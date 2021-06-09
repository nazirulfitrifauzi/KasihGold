<?php

namespace App\Http\Livewire\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    /** @var string */
    public $email = '';

    /** @var string */
    public $password = '';

    /** @var bool */
    public $remember = false;

    protected $rules = [
        'email' => ['required', 'email'],
        'password' => ['required'],
    ];

    public function authenticate()
    {
        $this->validate();

        if (!Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            $this->addError('email', trans('auth.failed'));

            return;
        }

        // if(auth()->user()->role == '3'){ // user dashboard
        //     return redirect()->to('/dashboard');
        // } else { // agent n admin dashboard
        //     return redirect()->to('/home');
        // }

        if(auth()->user()->client == 1) { // Kasih Gold
            if (auth()->user()->role == 1) { // hq
                return redirect()->to('/home');
            } elseif (auth()->user()->role == 3) { // agent
                return redirect()->to('/home');
            } elseif (auth()->user()->role == 5) { // user
                return redirect()->to('/home');
            }
        } else { //kasih AP
            if (auth()->user()->role == 2) { // hq
                return redirect()->to('/dashboardHqkasihAp');
            } elseif (auth()->user()->role == 4) { // agent
                return redirect()->to('/dashboardAgentkasihAp');
            } elseif (auth()->user()->role == 6) { // user
                return redirect()->to('/dashboardkasihAp');
            }
        }
    }

    public function render()
    {
        return view('livewire.auth.login')->extends('layouts.auth');
    }
}
