<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
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

        $user = User::where('email', $this->email)->first();

        if (!Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            $this->addError('email', trans('auth.failed'));
            return;
        } elseif ($user->active == 0 ) {
            $this->addError('email', 'Your account is not activated yet.');
            return;
        } elseif ($user->active == 2) {
            $this->addError('email', 'Your account has been deactivated.');
            return;
        }

        return redirect()->to('/home');
    }

    public function render()
    {
        return view('livewire.auth.login')->extends('layouts.auth');
    }
}
