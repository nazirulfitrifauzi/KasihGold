<?php

namespace App\Http\Livewire\Auth;

use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Livewire\Component;

class Register extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';
    public $passwordConfirmation = '';
    // public $type = '';
    // public $client = ''; hide for live KAP
    public $tnc;


    public function register()
    {
        $this->validate([
            'name'      => ['required'],
            'email'     => ['required', 'email', 'unique:users'],
            'password'  => ['required', 'min:8', 'same:passwordConfirmation'],
            'tnc'       => ['required'],
        ]);

        $user = User::create([
            'email'     => $this->email,
            'name'      => $this->name,
            'password'  => Hash::make($this->password),
            'role'      => 4,
            // 'type'      => $this->type,
            'type'      => 1,
            // 'client'    => $this->client, hide utk live Kasih AP
            'client'    => 2,
        ]);

        event(new Registered($user));

        Auth::login($user, true);

        return redirect()->intended(route('home'));
    }

    public function registerAgent()
    {
        $this->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8', 'same:passwordConfirmation'],
            'tnc' => ['required'],
        ]);

        $user = User::create([
            'email'     => $this->email,
            'name'      => $this->name,
            'password'  => Hash::make($this->password),
            'role'      => 3,
            // 'client'    => $this->client, hide utk live Kasih AP
            'client'    => 2,
            'type'      => 2,
        ]);

        event(new Registered($user));

        Auth::login($user, true);

        return redirect()->intended(route('home'));
    }

    public function render()
    {
        return view('livewire.auth.register')->extends('layouts.auth');
    }
}
