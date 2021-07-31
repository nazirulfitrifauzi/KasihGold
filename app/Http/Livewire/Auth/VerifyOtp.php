<?php

namespace App\Http\Livewire\Auth;

use App\Mail\admin\CreditBalance;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class VerifyOtp extends Component
{
    public $phone_no;
    public $first, $second, $third, $fourth, $fifth, $sixth;

    public function mount()
    {
        $no = auth()->user()->phone_no;

        $x = substr($no, 0, 3);
        $y = str_repeat("X", (strlen($no) - 6));
        $z = substr($no, -3);
        $this->phone_no = '+6 ' . $x.'-'.$y.$z;
    }

    public function verifyOTP()
    {
        $otp = $this->first.$this->second.$this->third.$this->fourth.$this->fifth.$this->sixth;

        // generate OTP code n sms to the user
        $client     = new \GuzzleHttp\Client();
        $response = $client->request('POST', "https://api.esms.com.my/sms/otp/verify", ['query' => [
            'api-key'       => config('esms.key'),
            'api-secret'    => config('esms.secret'),
            'phone'         => '6' . auth()->user()->phone_no,
            'code'          => $otp
        ]]);

        $content = json_decode($response->getBody(), true);

        if ($content['status'] == 0) {  //success
            User::whereId(auth()->user()->id)->update([
                'otp_verified_at' => now(),
            ]);

            session()->flash('success');
            session()->flash('title', 'Success!');
            session()->flash('message', 'Your phone has been verified.');
            return redirect('/profile');
        } elseif ($content['status'] == 16) {
            session()->flash('error');
            session()->flash('title', 'Failed!');
            session()->flash('message', 'The supplied OTP code is invalid.');
            return redirect()->to('/verify-otp');
        } else {
            session()->flash('warning');
            session()->flash('title', 'Attention!');
            session()->flash('message', 'Server error. You may retry again shortly.');
            return redirect()->to('/verify-otp');
        }
    }

    public function resend()
    {
        //generate OTP code n sms to the user
        $client     = new \GuzzleHttp\Client();
        $response = $client->request('POST', "https://api.esms.com.my/sms/otp/generate", ['query' => [
            'api-key'       => config('esms.key'),
            'api-secret'    => config('esms.secret'),
            'phone'         => '6' . auth()->user()->phone_no,
            'brand-name'    => 'KASIH AP GOLD',
            'duration'      => 5,
        ]]);

        $content = json_decode($response->getBody(), true);

        if ($content['status'] == 0) {  //success
            session()->flash('success');
            session()->flash('title', 'Success!');
            session()->flash('message', 'New OTP code has been sent to your phone.');
        } else if ($content['status'] == 5) { // insufficient credit
            $admin = User::where('role', 1)->where('client', 2)->get();
            Mail::to($admin->email)->send(new CreditBalance());

            session()->flash('error');
            session()->flash('title', 'Warning!');
            session()->flash('message', 'Problem detected. Try again in few minutes.');
        }

        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.auth.verify-otp')->extends('layouts.auth');
    }
}
