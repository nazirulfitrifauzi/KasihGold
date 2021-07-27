<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Livewire\Component;

class RegisterAgent extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';
    public $passwordConfirmation = '';
    public $tnc;

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
            'client'    => 2,
            'type'      => 2,
        ]);

        event(new Registered($user));

        Auth::login($user, true);

        return redirect()->intended(route('home'));
    }

    public function render()
    {
        return view('livewire.auth.register-agent')->extends('layouts.auth');
    }
}
