<?php

namespace App\Http\Livewire\Page\PhysicalGold;

use App\Models\PhysicalConvert;
use App\Models\States;
use Livewire\Component;

class PhyConfirmConversion extends Component
{

    public $name, $ic, $comp_no, $email, $gender, $gender_description, $phone1, $fax_no, $address1, $address2, $address3, $postcode, $town, $state, $membership_id;
    public $states;

    public function mount()
    {
        $this->states = States::all();

        $this->membership_id = auth()->user()->profile->membership_id ?? "";

        $this->name = auth()->user()->name;
        $this->ic = auth()->user()->profile->ic ?? "";
        $this->comp_no = auth()->user()->profile->comp_no ?? "";
        $this->email = auth()->user()->email;
        $this->gender = auth()->user()->profile->gender_id ?? 1;
        $this->gender_description = ucwords(auth()->user()->profile->gender->description ?? "MALE");
        $this->phone1 = auth()->user()->profile->phone1 ?? "";
        $this->fax_no = auth()->user()->profile->fax_no ?? "";
        $this->address1 = auth()->user()->profile->address1 ?? "";
        $this->address2 = auth()->user()->profile->address2 ?? "";
        $this->address3 = auth()->user()->profile->address3 ?? "";
        $this->postcode = auth()->user()->profile->postcode ?? "";
        $this->town = auth()->user()->profile->town ?? "";
        $this->state = auth()->user()->profile->state_id ?? 0;
    }

    public function buy()
    {

        // PhysicalConvert::create([
        //     'user_id'       => auth()->user()->id,
        //     'one_gram'      => auth()->user()->id,
        //     'quarter_gram'  => auth()->user()->id,
        //     'ref_payment'   => "KG",
        //     'created_at'    => now(),
        //     'updated_at'    => now(),
        // ]);

        session()->flash('success');
        session()->flash('title', 'Success!');
        session()->flash('message', 'Your Physical Conversion request has successfully submitted');
        return redirect('home');
    }

    public function render()
    {
        return view('livewire.page.physical-gold.phy-confirm-conversion');
    }
}
