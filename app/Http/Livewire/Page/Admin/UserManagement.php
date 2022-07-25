<?php

namespace App\Http\Livewire\Page\Admin;

use App\Models\DeceasedUser;
use App\Models\Profile_personal;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class UserManagement extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $search = '';
    public $agent;
    public $selectedAgent;
    public $death_cert;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->agent = User::whereRole(3)->get();
    }

    public function submit($id)
    {
        Profile_personal::where('user_id',$id)->update([
            'agent_id' => $this->selectedAgent,
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
            'death_cert'      => 'required|mimes:pdf|max:10000',// 10MB Max
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
        return view('livewire.page.admin.user-management', [
            'list' => User::where('role','!=',1)
                            ->where('email', 'like', '%' . $this->search . '%')
                            ->paginate(10),
        ])->extends('default.default');
    }
}
