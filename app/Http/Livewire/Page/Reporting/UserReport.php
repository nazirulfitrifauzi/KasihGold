<?php

namespace App\Http\Livewire\Page\Reporting;

use Livewire\Component;

class UserReport extends Component
{
    public $status;
    public $parameters;
    public $report = 'user-report';


    public function mount()
    {
        $this->status = $this->status;
    }

    public function render()
    {
        $this->parameters = "report=" . $this->report ."&status=".$this->status;
        return view('livewire.page.reporting.user-report')->extends('default.default');
    }
}
