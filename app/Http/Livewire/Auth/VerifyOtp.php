<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class VerifyOtp extends Component
{
    public $phone_no;

    public function mount()
    {
        $no = '0189445211';

        $x = substr($no, 0, 3);
        $y = str_repeat("X", (strlen($no) - 6));
        $z = substr($no, -3);
        $this->phone_no = '+6 ' . $x.'-'.$y.$z;
    }

    public function render()
    {
        return view('livewire.auth.verify-otp');
    }
}
