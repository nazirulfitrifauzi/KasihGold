<?php

namespace App\Http\Livewire\Page;

use App\Models\InvMovement;
use App\Models\Profile as ModelsProfile;
use App\Models\States;
use App\Models\User;
use Livewire\Component;

class Profile extends Component
{
    public $name, $ic, $email, $gender, $gender_description, $phone1, $address1, $address2, $address3, $postcode, $town, $state, $states;
    public $movement;

    public function mount()
    {
        $this->name = auth()->user()->name;
        $this->ic = auth()->user()->profile->ic;
        $this->email = auth()->user()->email;
        $this->gender = auth()->user()->profile->gender_id;
        $this->gender_description = ucwords(auth()->user()->profile->gender->description);
        $this->phone1 = auth()->user()->profile->phone1;
        $this->address1 = auth()->user()->profile->address1;
        $this->address2 = auth()->user()->profile->address2;
        $this->address3 = auth()->user()->profile->address3;
        $this->postcode = auth()->user()->profile->postcode;
        $this->town = auth()->user()->profile->town;
        $this->state = auth()->user()->profile->state_id;
        $this->states = States::all();

        $this->movement = InvMovement::where('from_user_id', auth()->user()->id)->orWhere('to_user_id', auth()->user()->id)->get();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'name' => 'required',
            'ic' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'phone1' => 'required',
            'address1' => 'required',
            'address2' => 'required',
            'address3' => 'nullable',
            'postcode' => 'required',
            'town' => 'required',
            'state' => 'required',
        ]);
    }

    public function savePersonalInformation()
    {
        $data = $this->validate([
            'name' => 'required',
            'ic' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'phone1' => 'required',
            'address1' => 'required',
            'address2' => 'required',
            'address3' => 'nullable',
            'postcode' => 'required',
            'town' => 'required',
            'state' => 'required',
        ]);
        

        User::where('id', auth()->user()->id)
            ->update([
                'name' => $data['name'],
                'email' => $data['email'],
            ]);

        ModelsProfile::where('user_id',auth()->user()->id)
            ->update([
                'ic' => $data['ic'],
                'gender_id' => $data['gender'],
                'phone1' => $data['phone1'],
                'address1' => $data['address1'],
                'address2' => $data['address2'],
                'address3' => $data['address3'],
                'postcode' => $data['postcode'],
                'town' => $data['town'],
                'state_id' => $data['state'],
            ]);

        session()->flash('success', 'Profile updated.');
    }
    
    public function render()
    {
        return view('livewire.page.profile');
    }
}
