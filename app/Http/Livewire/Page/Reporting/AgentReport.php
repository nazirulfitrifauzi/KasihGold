<?php

namespace App\Http\Livewire\Page\Reporting;

use App\Models\User;
use Livewire\Component;

class AgentReport extends Component
{
    public $report_date, $agent;
    public $parameters;
    public $report = 'agents-report';

    public function mount()
    {
        $this->report_date = now()->format('Y-m');
        $this->agent = $this->agent;
    }

    public function render()
    {
        $this->parameters = "report=" . $this->report ."&report_date=".$this->report_date."&agent=".$this->agent;
        return view('livewire.page.reporting.agent-report',[
            'agents' => User::whereRole(3)->get(),
        ])->extends('default.default');
    }
}
