<?php

namespace App\Http\Livewire\Page\SnapNPay;

use Livewire\Component;

class LoadPage extends Component
{
    public function buy()
    {
        session()->flash('success');
        session()->flash('title', 'Success!');
        session()->flash('message', 'Product successfully added to your Gold Shelf!');
        return redirect()->to('/home');
    }

    public function render()
    {
        return view('livewire.page.snap-n-pay.load-page');
    }
}
