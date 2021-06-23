<?php

namespace App\Http\Livewire\Page\Bank;

use Livewire\Component;

class BankInformation extends Component
{

    public function buy()
    {
        session()->flash('success');
        session()->flash('title', 'Success!');
        session()->flash('message', 'Your Outright request has successfully submitted');
        return redirect('home');
    }

    public function render()
    {
        return view('livewire.page.bank.bank-information');
    }
}
