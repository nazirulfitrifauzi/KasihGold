<?php

namespace App\Http\Livewire\Page\Admin;

use App\Models\DeceasedUser;
use App\Models\Profile_personal;
use App\Models\User;
use App\Models\UserDownline;
use App\Models\UserUpline;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class UserDetails extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $search = '';
    public $agent;
    public $selectedAgent;
    public $death_cert;
    public $check = false;
    public $userId;
    public $ic;
    public $email;
    public $phone;
    public $newUpline;

    public function toggleDeceased()
    {
        $this->check = !$this->check;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount($id)
    {
        $user = User::whereId($id)->first();
        $this->userId = $id;
        $this->agent = User::whereRole(3)->get();

        $this->ic = $user->profile->ic ?? "";
        $this->email = $user->email;
        $this->phone = $user->phone_no ?? "";
    }

    public function submitProfile($id)
    {
        User::whereId($id)
            ->update([
                'email' => $this->email,
                'phone_no' => $this->phone,
            ]);

        Profile_personal::where('user_id', $id)
            ->update([
                'ic' => $this->ic,
            ]);

        $this->emit('message', 'User personal information has been updated.');
    }

    public function submit($id)
    {
        $upline_new = Profile_personal::where('code', $this->newUpline)->first();
        $count = UserUpline::where('user_id', $id)->count();

        if ($count == 0) {
            UserUpline::create([
                'user_id' => $id,
                'upline_id' => $upline_new->user_id,
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            UserDownline::create([
                'user_id' => $upline_new->user_id,
                'downline_id' => $id,
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        Profile_personal::where('user_id', $id)->update([
            'agent_id' => $this->selectedAgent,
            'introducer_code' => $this->selectedAgent,
        ]);

        $this->selectedAgent = "";
        $this->dispatchBrowserEvent('close-modal'); // close modal when done

        session()->flash('success');
        session()->flash('title', 'Success!');
        session()->flash('message', 'User has been transfered to the new agent.');
    }

    public function submitDeceased($id)
    {
        $user = User::find($id);
        $data = $this->validate([
            'death_cert'      => 'required|mimes:pdf|max:10000', // 10MB Max
        ]);

        if ($this->death_cert != NULL) {
            $this->death_cert->storeAs('public/document/' . $user->id, $user->profile->ic . '_death_cert.' . $this->death_cert->extension());
            DeceasedUser::updateOrCreate([
                'user_id'       => $id
            ], [
                'doc_name'          => 'storage/document/' . $user->id . '/' . $user->profile->ic . '_death_cert.' . $this->death_cert->extension(),
            ]);
        }

        User::whereId($id)->update([
            'active'  => 9,
        ]);

        $this->death_cert = "";
        $this->dispatchBrowserEvent('close-modal3'); // close modal when done

        session()->flash('success');
        session()->flash('title', 'Success!');
        session()->flash('message', 'User has been tagged as Deceased.');
    }

    public function render()
    {
        $lists = User::with('upline')->whereId($this->userId)->first();
        // dd($lists->profile);

        return view('livewire.page.admin.user-details', [
            'lists' => $lists,
            'upline' => $lists->upline,
            // 'history' => NewOrders::where('user_id', $this->userId)->count(),
        ])->extends('default.default');

        // return view('livewire.page.admin.user-details');
    }
}
