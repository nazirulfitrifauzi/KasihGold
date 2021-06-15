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
    public $type = '';
    public $client = '';

    public function register() {
        $this->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8', 'same:passwordConfirmation'],
        ]);

        $user = User::create([
            'email'     => $this->email,
            'name'      => $this->name,
            'password'  => Hash::make($this->password),
            'role'      => ($this->client == 1) ? 5 : 6,
            'type'      => $this->type,
            'client'    => $this->client,
        ]);

        event(new Registered($user));

        Auth::login($user, true);

        if ($this->client == 1) { // kg
            return redirect()->intended(route('home'));
        } elseif ($this->client == 2) { // kasihap
            return redirect()->intended(route('dashboardKasihAp'));
        }
    }

    public function registerAgent() {
        $this->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8', 'same:passwordConfirmation'],
        ]);

        $user = User::create([
            'email'     => $this->email,
            'name'      => $this->name,
            'password'  => Hash::make($this->password),
            'role'      => ($this->client == 1) ? 3 : 4,
            'type'      => $this->type,
            'client'    => $this->client,
        ]);

        event(new Registered($user));

        Auth::login($user, true);

        if ($this->client == 1) { // kg
            return redirect()->intended(route('home'));
        } elseif ($this->client == 2) { // kasihap
            return redirect()->intended(route('dashboardAgentkasihAp'));
        }

        return redirect()->intended(route('home'));
    }

    public function render()
    {
        return view('livewire.auth.register')->extends('layouts.auth');
    }
}
