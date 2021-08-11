<?php

namespace App\Http\Livewire\Page\Admin\Announcement;

use Livewire\Component;

class CreateAnnouncement extends Component
{
    public function render()
    {
        return view('livewire.page.admin.announcement.create-announcement')->extends('default.default');
    }
}
