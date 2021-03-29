<?php

namespace App\Http\Livewire\Page;

use App\Models\BankAccId;
use App\Models\BankInfo;
use App\Models\Banks;
use App\Models\InvMovement;
use App\Models\Profile as ModelsProfile;
use App\Models\States;
use App\Models\User;
use Livewire\Component;

class Profile extends Component
{
    public $name, $ic, $email, $gender, $gender_description, $phone1, $address1, $address2, $address3, $postcode, $town, $state, $pgCode, $introducer, $introducerName, $preferredBranch;
    public $bankId, $swiftCode, $accNo, $accHolderName, $bankAttachment;
    public $bankAccs;
    public $states, $banks;
    public $movement;

    public function mount()
    {
        $this->states = States::all();
        $this->banks = Banks::all();
        
        $this->pgCode = auth()->user()->profile->pg_code;
        $this->introducer = auth()->user()->profile->introducer;
        $this->introducerName = auth()->user()->profile->introducer_name;
        $this->preferredBranch = auth()->user()->profile->preferred_branch;

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
        
        $bankInfo = BankInfo::where('user_id', auth()->user()->id)->first();

        $this->bankId = $bankInfo->bank_id ?? "";
        $this->swiftCode = $bankInfo->swift_code ?? "";
        $this->accNo = $bankInfo->acc_no ?? "";
        $this->accHolderName = $bankInfo->acc_holder_name ?? "";
        $this->bankAttachment = $bankInfo->attachment ?? "";
        $this->bankAccs = ($this->bankId != "") ? BankAccId::where('bank_info_id', $bankInfo->id)->get() : [];

        $this->movement = InvMovement::where('from_user_id', auth()->user()->id)->orWhere('to_user_id', auth()->user()->id)->get();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'pgCode' => 'required',
            'introducer' => 'required',
            'introducerName' => 'required',
            'preferredBranch' => 'required',
        ]);
        
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

    public function savePersonal()
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

    public function saveReferrer()
    {
        $data = $this->validate([
            'pgCode' => 'required',
            'introducer' => 'required',
            'introducerName' => 'required',
            'preferredBranch' => 'required',
        ]);

        ModelsProfile::where('user_id',auth()->user()->id)
            ->update([
                'pg_code' => $data['pgCode'],
                'introducer' => $data['introducer'],
                'introducer_name' => $data['introducerName'],
                'preferred_branch' => $data['preferredBranch'],
            ]);

        session()->flash('success', 'Profile updated.');
    }
    
    public function render()
    {
        return view('livewire.page.profile');
    }
}
