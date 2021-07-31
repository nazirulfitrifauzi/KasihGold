<?php

namespace App\Http\Livewire\Auth;

use App\Mail\admin\CreditBalance;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
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
        // $client     = new \GuzzleHttp\Client();
        // $response = $client->request('POST', "https://api.esms.com.my/sms/otp/generate", ['query' => [
        //     'api-key'       => config('esms.key'),
        //     'api-secret'    => config('esms.secret'),
        //     'phone'         => '6' . $data['phone_no'],
        //     'brand-name'    => 'KASIH AP GOLD',
        //     'duration'      => 5,
        // ]]);

        // $content = json_decode($response->getBody(), true);

        // if ($content['status'] == 0) {  //success
        //     return redirect()->intended(route('home'));
        // } else if ($content['status'] == 5) { // insufficient credit
        //     Mail::to('nazirulfitrifauzi@gmail.com')->send(new CreditBalance());
        //     return redirect()->route('/login');
        // }

        $content = 5;
        if ($content == 5) { // insufficient credit
            Mail::to('nazirulfitrifauzi@gmail.com')->send(new CreditBalance());
            return redirect()->route('/login');
        }
    }

    public function render()
    {
        return view('livewire.auth.register')->extends('layouts.auth');
    }
}
