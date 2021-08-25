<?php

namespace App\Http\Livewire\Page\Reporting;

use App\Models\User;
use Livewire\Component;

class AgentReport extends Component
{
    public function render()
    {
        return view('livewire.page.reporting.agent-report',[
            'agents' => User::whereRole(3)->get(),
        ]);
    }
}
