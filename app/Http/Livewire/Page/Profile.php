<?php

namespace App\Http\Livewire\Page;

use App\Models\Banks;
use App\Models\InvMovement;
use App\Models\MemberRelationship;
use App\Models\Profile_bank_info;
use App\Models\Profile_nominee;
use App\Models\Profile_personal;
use App\Models\States;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;

    public $temp_code;
    public $profile_id, $name, $ic, $comp_no, $email, $gender, $gender_description, $phone1, $fax_no, $address1, $address2, $address3, $postcode, $town, $state, $code, $introducer, $introducerName, $agentId, $membership_id, $old_ic, $passport, $gov_id;
    public $bankId, $swiftCode, $accNo, $accHolderName, $bankAttachment, $bankAccId;
    public $states, $banks, $agent;
    public $movement;
    public $memberRelationshipList;
    public $nom_name, $nom_id, $nom_dob, $nom_mem_rel, $nom_perc;
    public $doc_nom, $doc_ic;
    public $doc_nom_ic = [];
    public $doc_dir_list = [];

    public function mount()
    {
        $this->profile_id = auth()->user()->profile->id ?? "";
        $this->agent = User::whereRole(3)->whereClient(2)->whereActive(1)->get();
        $this->states = States::all();
        $this->banks = Banks::all();
        $this->memberRelationshipList = MemberRelationship::all();

        // check user with respective client code that has profile attached, and get the last code;
        $client = auth()->user()->client;
        $last_code = User::has('profile')->where('client', $client)->get()->pluck('profile.code')->last();

        $this->temp_code = sprintf('%06d', $last_code + 1);
        if (auth()->user()->profile != NULL) {
            $this->code = auth()->user()->profile->code;
        } else {
            $this->code = $this->temp_code;
        }
        $this->introducer = auth()->user()->profile->introducer ?? "";
        $this->introducerName = auth()->user()->profile->introducer_name ?? "";
        $this->membership_id = auth()->user()->profile->membership_id ?? "";

        $this->agentId = auth()->user()->profile->agent_id ?? 0;

        $this->name = auth()->user()->name;
        $this->ic = auth()->user()->profile->ic ?? "";
        $this->comp_no = auth()->user()->profile->comp_no ?? "";
        $this->email = auth()->user()->email;
        $this->gender = auth()->user()->profile->gender_id ?? 1;
        $this->gender_description = ucwords(auth()->user()->profile->gender->description ?? "MALE");

        if (auth()->user()->role == 3) {
            $this->phone1 = auth()->user()->profile->phone1 ?? "";
        } else if (auth()->user()->role == 4) {
            $this->phone1 = auth()->user()->phone_no ?? "";
        }

        $this->fax_no = auth()->user()->profile->fax_no ?? "";
        $this->old_ic = auth()->user()->profile->old_ic ?? "";
        $this->passport = auth()->user()->profile->passport ?? "";
        $this->gov_id = auth()->user()->profile->gov_id ?? "";
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

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'name'              => 'required',
            'ic'                => auth()->user()->type == 1 ? 'required|unique:profile_personal,ic,'. $this->profile_id : '',
            'comp_no'           => auth()->user()->type == 2 ? 'required|unique:profile_personal,comp_no,' . $this->profile_id : '',
            'gender'            => 'required',
            'phone1'            => 'required',
            'fax_no'            => auth()->user()->type == 2 ? 'required' : '',
            'address1'          => 'required',
            'address2'          => 'required',
            'address3'          => 'nullable',
            'postcode'          => 'required',
            'town'              => 'required',
            'state'             => 'required',
            'agentId'           => auth()->user()->type == 2 ? 'required' : '',
            'bankId'            => 'required',
            'swiftCode'         => 'required',
            'accNo'             => 'required',
            'accHolderName'     => 'required',
            'bankAccId'         => 'required',
            'bankAttachment'    => 'required',
            'nom_name'          => 'required',
            'nom_id'            => 'required',
            'nom_dob'           => 'required',
            'nom_mem_rel'       => 'required',
            'nom_perc'          => 'required',
            'doc_nom'           => 'required|file|max:2048',
            'doc_ic'            => 'required|file|max:2048',
            'doc_nom_ic.*'      => 'required|file|max:2048',
        ]);
    }

    public function savePersonal()
    {
        if (auth()->user()->type == 1) {
            $data = $this->validate([
                'agentId'       => 'required',
                'name'          => 'required',
                'ic'            => 'required|unique:profile_personal,ic,' . $this->profile_id,
                'email'         => 'required',
                'gender'        => 'required',
                'phone1'        => 'required',
                'address1'      => 'required',
                'address2'      => 'required',
                'address3'      => 'nullable',
                'postcode'      => 'required',
                'town'          => 'required',
                'state'         => 'required',
            ]);
        } else {
            $data = $this->validate([
                'name'          => 'required',
                'comp_no'       => 'required|unique:profile_personal,comp_no,' . $this->profile_id,
                'email'         => 'required',
                'gender'        => 'required',
                'phone1'        => 'required',
                'fax_no'        => 'required',
                'address1'      => 'required',
                'address2'      => 'required',
                'address3'      => 'nullable',
                'postcode'      => 'required',
                'town'          => 'required',
                'state'         => 'required',
            ]);
        }

        User::where('id', auth()->user()->id)
            ->update([
                'name' => $data['name'],
            ]);

        if (auth()->user()->type == 1) {
            Profile_personal::updateOrCreate([
                'user_id'       => auth()->user()->id
            ], [
                'agent_id'      => $data['agentId'],
                'code'          => (auth()->user()->profile != NULL) ? auth()->user()->profile->code : $this->temp_code,
                'gender_id'     => $data['gender'],
                // 'phone1'        => $data['phone1'],
                'old_ic'        => $this->old_ic,
                'passport'      => $this->passport,
                'gov_id'        => $this->gov_id,
                'address1'      => $data['address1'],
                'address2'      => $data['address2'],
                'address3'      => $data['address3'],
                'postcode'      => $data['postcode'],
                'town'          => $data['town'],
                'state_id'      => $data['state'],
                'completed'     => 1, //pending checking mandatory field, if completed, flag completed to 1. for now now checking.
            ]);

            User::whereId(auth()->user()->id)->update([
                'phone_no'  => $data['phone1'],
            ]);
        } else {
            Profile_personal::updateOrCreate([
                'user_id' => auth()->user()->id
            ], [
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
        }

        if (auth()->user()->type == 1) {
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
        ], [
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

    public function checkCompleted()
    {
        if (auth()->user()->profile != NULL && auth()->user()->bank != NULL) {
            if (auth()->user()->profile->completed == 1 && auth()->user()->bank->completed == 1) {
                User::where('id', auth()->user()->id)->update(['profile_c' => 1]);
            }
        }
    }

    public function addNominee()
    {
        $data = $this->validate([
            'nom_name'          => 'required',
            'nom_id'            => 'required',
            'nom_dob'           => 'required',
            'nom_mem_rel'       => 'required',
            'nom_perc'          => 'required',
        ]);

        Profile_nominee::create([
            'user_id' => auth()->user()->id,
            'nominee_name' => $data['nom_name'],
            'nominee_id' => $data['nom_id'],
            'nominee_dob' => $data['nom_dob'],
            'member_relationship_id' => $data['nom_mem_rel'],
            'percentage' => $data['nom_perc'],
        ]);

        $this->nom_name = "";
        $this->nom_id = "";
        $this->nom_dob = "";
        $this->nom_mem_rel = 0;
        $this->nom_perc = "";

        session()->flash('success');
        session()->flash('title', 'Success!');
        session()->flash('message', 'Nominee successfully added.');
    }

    public function nomineeUpload()
    {
        $this->validate([
            'doc_nom'       => 'required|file|max:2048',
            'doc_ic'        => 'required|file|max:2048',
            'doc_nom_ic.*'  => 'required|file|max:2048',
        ]);

        $this->doc_nom->storeAs('public/nominee/' . auth()->user()->id, 'nominee-form.pdf');
        $this->doc_ic->storeAs('public/nominee/' . auth()->user()->id, 'owner-ic.pdf');
        foreach ($this->doc_nom_ic as $key => $nom_ic) {
            $nom_ic->storeAs('public/nominee/' . auth()->user()->id, 'nominee-ic-' . uniqid() . '.pdf');
        }


        session()->flash('success');
        session()->flash('title', 'Success!');
        session()->flash('message', 'Nominee details successfully uploaded.');

        return redirect()->route('profile');
    }

    public function resetNominee()
    {
        // Delete storage directory
        $delete = Storage::deleteDirectory('public/nominee/' . auth()->user()->id);

        // Delete nominee profile details
        Profile_nominee::where('user_id', auth()->user()->id)->delete();

        session()->flash('success');
        session()->flash('title', 'Information!');
        session()->flash('message', 'Nominee has been reset.');
    }

    private function getDocDirectoryList()
    {
        $docDirList = [];

        $list = Storage::files('public/nominee/' . auth()->user()->id);

        foreach ($list as $dir) {
            $dir = str_replace('public', 'storage', $dir);
            $nameArr = explode('/', $dir);
            $docDirList['name'][] = end($nameArr);
            $docDirList['dir'][] = $dir;
        }

        return $docDirList;
    }

    public function render()
    {
        return view('livewire.page.profile', [
            'nomineeList' => Profile_nominee::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get(),
            'docDirList' => $this->getDocDirectoryList(),
        ]);
    }
}
