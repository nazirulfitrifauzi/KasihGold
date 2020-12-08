<?php

namespace App\Http\Livewire\Page\Admin;

use Livewire\Component;
use App\Models\FeedbackList;
use Livewire\WithPagination;

class IncidentReporting extends Component
{
    use WithPagination;
    public $search;

    public function mount()
    {
        $this->search = date('Y-m-d');
    }

    public function render()
    {
        $date = ($this->search != "") ? date('Y-m-d', strtotime($this->search)) : "";

        return view('livewire.page.admin.incident-reporting',[
            'list' => FeedbackList::whereDate('created_at', 'like', '%'.$date.'%')->paginate(5),
        ]);
    }
}
