<?php

namespace App\Http\Livewire\Page\Reporting;

use App\Models\Goldbar;
use Livewire\Component;

class GoldReport extends Component
{
    public $report_date, $serial;
    public $parameters;
    public $report = 'gold-report';


    public function mount()
    {
        $this->report_date = now()->format('Y-m');
        $this->serial = $this->serial;
    }

    public function render()
    {
        $this->parameters = "report=" . $this->report ."&report_date=".$this->report_date."&serial=".$this->serial;

        return view('livewire.page.reporting.gold-report', [
            'goldbar' => Goldbar::get(),
        ])->extends('default.default');
    }
}
