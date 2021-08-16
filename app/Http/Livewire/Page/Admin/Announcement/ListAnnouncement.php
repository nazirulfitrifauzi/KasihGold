<?php

namespace App\Http\Livewire\Page\Admin\Announcement;

use App\Models\Announcement;
use Livewire\Component;
use Livewire\WithPagination;

class ListAnnouncement extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.page.admin.announcement.list-announcement',[
            'list' => Announcement::where('title', 'like', '%' . $this->search . '%')
                                    ->paginate(10),
        ])->extends('default.default');
    }
}
