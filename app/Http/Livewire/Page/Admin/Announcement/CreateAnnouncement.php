<?php

namespace App\Http\Livewire\Page\Admin\Announcement;

use App\Models\Announcement;
use Livewire\Component;

class CreateAnnouncement extends Component
{
    public $title;
    public $description;

    public function create()
    {
        $this->validate([
            'title'              => ['required', 'min:5'],
            'description'        => ['required', 'min:10']
        ]);

        Announcement::create([
            'title'         => $this->title,
            'description'   => $this->description,
            'created_by'    => auth()->user()->id,
            'created_at'    => now(),
        ]);

        session()->flash('success');
        session()->flash('title', 'Success!');
        session()->flash('message', 'Announcement successfully created.');
        return redirect()->route('admin.list-announcements');
    }

    public function render()
    {
        return view('livewire.page.admin.announcement.create-announcement')->extends('default.default');
    }
}
