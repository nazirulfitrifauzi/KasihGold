<?php

namespace App\Http\Livewire\Page;

use App\Models\User;
use Livewire\Component;

class DashboardAgentKasihAp extends Component
{
    public $pendingApproval;
    public $activeUser;

    public function mount()
    {
        $logged_user = auth()->user()->id;
        $this->pendingApproval = User::whereHas('profile', function ($query) use ($logged_user) {
            $query->where('agent_id', '=', $logged_user);
        })->whereClient(2)->whereRole(6)->whereActive(0)->get();

        $this->activeUser = User::where('client', 2)->where('role', 6)->where('active', 1)->get();
    }

    public function render()
    {
        return view('livewire.page.dashboard-agent-kasih-ap');
    }
}
