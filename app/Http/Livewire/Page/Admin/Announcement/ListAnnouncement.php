<?php

namespace App\Http\Livewire\Page\Admin\Announcement;

use Livewire\Component;

class ListAnnouncement extends Component
{
    public function render()
    {
        return view('livewire.page.admin.announcement.list-announcement')->extends('default.default');
    }
}
