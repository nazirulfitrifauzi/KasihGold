<?php

namespace App\Http\Livewire\Page\PhysicalGold;

use Livewire\Component;

class PhyConfirmConversion extends Component
{

    public function buy()
    {
        session()->flash('success');
        session()->flash('title', 'Success!');
        session()->flash('message', 'Your Physical Conversion request has successfully submitted');
        return redirect('dashboard');
    }

    public function render()
    {
        return view('livewire.page.physical-gold.phy-confirm-conversion');
    }
}
