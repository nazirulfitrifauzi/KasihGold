<?php

namespace App\Http\Livewire\Page;

use App\Models\User;
use Livewire\Component;

class DashboardAgentKasihAp extends Component
{
    public $pendingApproval;

    public function mount()
    {
        $this->pendingApproval = User::whereClient(2)->whereRole(6)->whereActive(0)->get();
    }

    public function render()
    {
        return view('livewire.page.dashboard-agent-kasih-ap');
    }
}
