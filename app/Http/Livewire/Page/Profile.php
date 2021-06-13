<?php

namespace App\Http\Livewire\Page;

use App\Mail\RequestMembershipIdKasihAP;
use App\Models\BankAccId;
use App\Models\Banks;
use App\Models\InvMovement;
use App\Models\Profile_bank_info;
use App\Models\Profile_personal;
use App\Models\States;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Profile extends Component
{
    public $temp_code;
    public $name, $ic, $comp_no, $email, $gender, $gender_description, $phone1, $fax_no, $address1, $address2, $address3, $postcode, $town, $state, $code, $introducer, $introducerName, $membership_id;
    public $bankId, $swiftCode, $accNo, $accHolderName, $bankAttachment, $bankAccId;
    public $states, $banks;
    public $movement;

    public function mount()
    {
        $this->states = States::all();
        $this->banks = Banks::all();

        // check user with respective client code that has profile attached, and get the last code;
        $client = auth()->user()->client;
        $last_code = User::has('profile')->where('client', $client)->get()->pluck('profile.code')->last();

        $this->temp_code = sprintf('%06d', $last_code + 1);
        if(auth()->user()->profile != NULL) {
            $this->code = auth()->user()->profile->code;
        } else {
            $this->code = $this->temp_code;
        }
        $this->introducer = auth()->user()->profile->introducer ?? "";
        $this->introducerName = auth()->user()->profile->introducer_name ?? "";
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

        $bankInfo = Profile_bank_info::where('user_id', auth()->user()->id)->first();

        $this->bankId = $bankInfo->bank_id ?? "";
        $this->swiftCode = $bankInfo->swift_code ?? "";
        $this->accNo = $bankInfo->acc_no ?? "";
        $this->accHolderName = $bankInfo->acc_holder_name ?? "";
        $this->bankAccId = $bankInfo->acc_id ?? "";
        $this->bankAttachment = $bankInfo->attachment ?? "";

        $this->movement = InvMovement::where('from_user_id', auth()->user()->id)->orWhere('to_user_id', auth()->user()->id)->get();
    }

    public function updated($propertyName) {
        $this->validateOnly($propertyName, [
            'name'              => 'required',
            'ic'                => auth()->user()->type == 1 ? 'required' : '',
            'comp_no'           => auth()->user()->type == 2 ? 'required' : '',
            'gender'            => 'required',
            'phone1'            => 'required',
            'fax_no'            => auth()->user()->type == 2 ? 'required' : '',
            'address1'          => 'required',
            'address2'          => 'required',
            'address3'          => 'nullable',
            'postcode'          => 'required',
            'town'              => 'required',
            'state'             => 'required',
            'bankId'            => 'required',
            'swiftCode'         => 'required',
            'accNo'             => 'required',
            'accHolderName'     => 'required',
            'bankAccId'         => 'required',
            'bankAttachment'    => 'required',
        ]);
    }

    public function savePersonal() {
        $data = $this->validate([
            'name'          => 'required',
            'ic'            => auth()->user()->type == 1 ? 'required' : '',
            'comp_no'       => auth()->user()->type == 2 ? 'required' : '',
            'email'         => 'required',
            'gender'        => 'required',
            'phone1'        => 'required',
            'fax_no'        => auth()->user()->type == 2 ? 'required' : '',
            'address1'      => 'required',
            'address2'      => 'required',
            'address3'      => 'nullable',
            'postcode'      => 'required',
            'town'          => 'required',
            'state'         => 'required',
        ]);

        User::where('id', auth()->user()->id)
            ->update([
                'name' => $data['name'],
            ]);

        Profile_personal::updateOrCreate([
            'user_id' => auth()->user()->id
        ],[
            'code'          => (auth()->user()->profile != NULL) ? auth()->user()->profile->code : $this->temp_code,
            'gender_id'     => $data['gender'],
            'phone1'        => $data['phone1'],
            'address1'      => $data['address1'],
            'address2'      => $data['address2'],
            'address3'      => $data['address3'],
            'postcode'      => $data['postcode'],
            'town'          => $data['town'],
            'state_id'      => $data['state'],
            'completed'     => 1, //pending checking mandatory field, if completed, flag completed to 1. for now now checking.
        ]);

        if(auth()->user()->type == 1) {
            Profile_personal::updateOrCreate([
                'user_id' => auth()->user()->id
            ], [
                'ic'            => $data['ic'],
            ]);
        } else {
            Profile_personal::updateOrCreate([
                'user_id' => auth()->user()->id
            ], [
                'comp_no'       => $data['comp_no'],
                'fax_no'        => $data['fax_no'],
            ]);
        }

        $this->checkCompleted();

        session()->flash('success');
        session()->flash('title', 'Success!');
        session()->flash('message', 'Your personal information has been updated.');
    }

    public function saveBank()
    {
        $data = $this->validate([
            'bankId'            => 'required',
            'swiftCode'         => 'required',
            'accNo'             => 'required',
            'accHolderName'     => 'required',
            'bankAccId'         => 'required',
        ]);

        Profile_bank_info::updateOrCreate([
            'user_id' => auth()->user()->id
        ],[
            'bank_id'           => $data['bankId'],
            'swift_code'        => $data['swiftCode'],
            'acc_no'            => $data['accNo'],
            'acc_holder_name'   => $data['accHolderName'],
            'acc_id'            => $data['bankAccId'],
            'completed'         => 1, //pending checking mandatory field, if completed, flag completed to 1. for now now checking.
        ]);

        $this->checkCompleted();

        session()->flash('success');
        session()->flash('title', 'Success!');
        session()->flash('message', 'Your bank information has been updated.');
    }

    public function checkCompleted() {
        if(auth()->user()->profile != NULL && auth()->user()->bank != NULL){
            if (auth()->user()->profile->completed == 1 && auth()->user()->bank->completed == 1) {
                User::where('id', auth()->user()->id)->update(['profile_c' => 1]);
            }
        }
    }

    public function render()
    {
        return view('livewire.page.profile');
    }
}
