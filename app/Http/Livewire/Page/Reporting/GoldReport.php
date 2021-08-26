<?php

namespace App\Http\Livewire\Page\Reporting;

use App\Models\Goldbar;
use Livewire\Component;

class GoldReport extends Component
{
    public function render()
    {
        return view('livewire.page.reporting.gold-report', [
            'goldbar' => Goldbar::get(),
        ]);
    }
}
