<?php

namespace App\Http\Livewire\Page\Tracking;

use Livewire\Component;
use Afzafri\PoslajuTrackingApi;

class Delivery extends Component
{
    public $tracking_no;
    public $result = "";

    public function submit()
    {
        $rules = $this->validate([
            'tracking_no'      => 'required',
        ]);

        $this->result = PoslajuTrackingApi::crawl($this->tracking_no, true);
    }

    public function render()
    {
        return view('livewire.page.tracking.delivery');
    }
}
