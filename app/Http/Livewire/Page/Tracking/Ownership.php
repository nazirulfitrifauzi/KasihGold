<?php

namespace App\Http\Livewire\Page\Tracking;

use App\Models\InvMasterHistory;
use Livewire\Component;

class Ownership extends Component
{
    public $serial_no;
    public $list = "";

    public function submit()
    {
        $rules = $this->validate([
            'serial_no'      => 'required',
        ]);

        $this->list = InvMasterHistory::where('serial_no', $this->serial_no)->get();
    }

    public function render()
    {
        return view('livewire.page.tracking.ownership');
    }
}
