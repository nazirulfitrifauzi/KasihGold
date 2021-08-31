<?php

namespace App\Http\Livewire\Page\Admin;

use App\Models\Profile_personal;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserManagement extends Component
{
    use WithPagination;

    public $search = '';
    public $agent;
    public $selectedAgent;

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

    public function render()
    {
        return view( 'livewire.page.admin.user-management', [
            'list' => User::where('role','!=',1)
                            ->where('users.email', 'like', '%' . $this->search . '%')
                            ->paginate(10),
        ])->extends('default.default');
    }
}
