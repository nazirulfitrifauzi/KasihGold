<?php

namespace App\Http\Livewire\Page;

use Livewire\Component;

class Profile extends Component
{
    public $name, $ic, $email, $gender, $phone1, $address1, $address2, $address3, $postcode, $town, $state;

    public function mount()
    {
        $this->name = auth()->user()->name;
        $this->ic = auth()->user()->profile->ic;
        $this->email = auth()->user()->email;
        $this->gender = auth()->user()->profile->gender_id;
        $this->phone1 = auth()->user()->profile->phone1;
        $this->address1 = auth()->user()->profile->address1;
        $this->address2 = auth()->user()->profile->address2;
        $this->address3 = auth()->user()->profile->address3;
        $this->postcode = auth()->user()->profile->postcode;
        $this->town = auth()->user()->profile->town;
        $this->state = auth()->user()->profile->state_id;
    }
    
    public function render()
    {
        return view('livewire.page.profile');
    }
}
