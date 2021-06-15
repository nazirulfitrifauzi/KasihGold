<?php

namespace App\Http\Livewire\Page\Downline;

use App\Models\User;
use Livewire\Component;

class DownlineDetail extends Component
{
    public $activeUser;

    public function mount()
    {
        $this->activeUser = User::find(auth()->user()->id)->downline;
    }

    public function render()
    {
        return view('livewire.page.downline.downline-detail');
    }
}
