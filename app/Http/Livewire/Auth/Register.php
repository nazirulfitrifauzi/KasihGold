<?php

namespace App\Http\Livewire\Auth;

use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Register extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';
    public $passwordConfirmation = '';
    // public $type = '';
    // public $client = ''; hide for live KAP
    public $phone_no;
    public $tnc;

    public function register()
    {
        $data = $this->validate([
            'name'      => ['required'],
            'email'     => ['required', 'email', 'unique:users'],
            'password'  => ['required', 'min:8', 'same:passwordConfirmation'],
            'phone_no'  => ['required', 'string', 'min:10', 'unique:users'],
            'tnc'       => ['required'],
        ]);

        $data['phone_no'] = str_replace('+', '', $data['phone_no']);
        $data['phone_no'] = str_replace('-', '', $data['phone_no']);
        $data['phone_no'] = str_replace(' ', '', $data['phone_no']);

        $user = User::create([
            'email'     => $this->email,
            'phone_no'  => $data['phone_no'],
            'name'      => $this->name,
            'password'  => Hash::make($this->password),
            'role'      => 4,
            'type'      => 1,
            'client'    => 2,
        ]);

        event(new Registered($user));

        Auth::login($user, true);

        // generate OTP code n sms to the user
        $client     = new \GuzzleHttp\Client();
        $client->request('POST', "https://api.esms.com.my/sms/otp/generate", ['query' => [
            'api-key'       => config('esms.key'),
            'api-secret'    => config('esms.secret'),
            'phone'         => '6' . $data['phone_no'],
            'brand-name'    => 'KASIH AP GOLD',
            'duration'      => 5,
        ]]);

        // $response = $client->request('POST', $endpoint, ['query' => [
        //     'api-key' => $key,
        //     'api-secret' => $secret,
        //     'phone' => $nPhone,
        //     'brand-name' => $brand,
        //     'duration' => $duration,
        // ]]);

        // $content = json_decode($response->getBody(), true);

        return redirect()->intended(route('home'));
    }

    public function render()
    {
        return view('livewire.auth.register')->extends('layouts.auth');
    }
}
