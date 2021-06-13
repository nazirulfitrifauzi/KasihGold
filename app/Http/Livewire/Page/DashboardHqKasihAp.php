<?php

namespace App\Http\Livewire\Page;

use App\Models\User;
use Livewire\Component;

class DashboardHqKasihAp extends Component
{
    public $pendingApproval;
    public $myAgent;

    public function mount()
    {
        $this->pendingApproval = User::where('client', 2)->where('role', 4)->where('active', 0)->get();
        $this->myAgent = User::where('client', 2)->where('role', 4)->where('active', 1)->get();
    }

    public function render()
    {
        return view('livewire.page.dashboard-hq-kasih-ap');
    }
}
