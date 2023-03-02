<?php

namespace App\Http\Livewire\Page\Reporting;

use Livewire\Component;

class ExitReport extends Component
{
    public $status;
    public $parameters;
    public $report = 'exit-report';


    public function mount()
    {
        $this->status = $this->status;
    }

    public function render()
    {
        $this->parameters = "report=" . $this->report ."&status=".$this->status;
        return view('livewire.page.reporting.exit-report')->extends('default.default');
    }
}
