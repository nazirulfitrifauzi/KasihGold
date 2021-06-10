<?php

namespace App\Http\Livewire\Page;

use App\Models\User;
use Livewire\Component;

class DashboardAgentKasihAp extends Component
{
    public $pendingApproval;

    public function mount()
    {
        $this->pendingApproval = User::where('client', 2)->where('role', 6)->where('active', 0)->get();
    }

    public function render()
    {
        return view('livewire.page.dashboard-agent-kasih-ap');
    }
}
