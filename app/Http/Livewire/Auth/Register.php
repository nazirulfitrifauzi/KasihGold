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
            'client'    => $this->client,
        ]);

        event(new Registered($user));

        Auth::login($user, true);

        return redirect()->intended(route('home'));
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
            'client'    => $this->client,
        ]);

        event(new Registered($user));

        session()->flash('message', 'Please wait for admin approval. You will be notified through email, once approved.');

        return redirect()->to('/login');
    }

    public function render()
    {
        return view('livewire.auth.register')->extends('layouts.auth');
    }
}
