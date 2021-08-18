<?php

namespace App\Http\Livewire\Auth;

use App\Mail\admin\CreditBalance;
use App\Models\Profile_personal;
use App\Models\ReferralCode;
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
    public $phone1;
    public $phone2;
    public $phone_no;
    public $referral_code;
    public $tnc;
    public $code;

    public function mount($code)
    {
        if($code == 'user') {
            $this->referral_code = 'KBuljv';
        } else {
            $this->referral_code = $code;
        }
    }

    public function register()
    {
        $this->phone2 = str_replace('-', '', $this->phone2);
        $this->phone2 = str_replace(' ', '', $this->phone2);
        $this->phone_no = $this->phone1 . $this->phone2;

        $data = $this->validate([
            'name'              => ['required'],
            'email'             => ['required', 'email', 'unique:users'],
            'password'          => ['required', 'min:8', 'same:passwordConfirmation'],
            'phone1'            => ['required'],
            'phone_no'          => ['required', 'string', 'min:10'],
            'referral_code'     => ['required', 'min:6', 'exists:App\Models\ReferralCode,referral_code'],
            'tnc'               => ['required'],
        ]);

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

        // find id newly created user & insert data to profile
        $user_id = User::whereEmail($this->email)->value('id');
        $agent   = ReferralCode::where('referral_code', $this->referral_code)->value('user_id');

        Profile_personal::updateOrCreate([
            'user_id'       => $user_id
        ], [
            'agent_id'      => $agent,
        ]);

        // generate OTP code n sms to the user
        $client     = new \GuzzleHttp\Client();
        $response = $client->request('POST', "https://api.esms.com.my/sms/otp/generate", ['query' => [
            'api-key'       => config('esms.key'),
            'api-secret'    => config('esms.secret'),
            'phone'         => '6' . $data['phone_no'],
            'brand-name'    => 'KASIH AP GOLD',
            'duration'      => 5,
        ]]);

        $content = json_decode($response->getBody(), true);

        if ($content['status'] == 0) {  //success
            Auth::login($user, true);
            return redirect()->intended(route('home'));
        } else if ($content['status'] == 5) { // insufficient credit
            $admin = User::where('role',1)->where('client',2)->get();
            Mail::to($admin->email)->send(new CreditBalance());

            session()->flash('error');
            session()->flash('title', 'Warning!');
            session()->flash('message', 'Problem detected. Try again in few minutes.');
            return redirect()->route('login');
        }
    }

    public function render()
    {
        return view('livewire.auth.register')->extends('layouts.auth');
    }
}
