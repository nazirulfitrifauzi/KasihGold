<?php

namespace App\Http\Livewire\Page;

use App\Models\InvCategory;
use App\Models\InvItem;
use App\Models\InvItemType;
use Livewire\Component;

class Setting extends Component
{
    public function render()
    {
        return view('livewire.page.setting', [
            'categories' => InvCategory::all(),
            'types' => InvItemType::all(),
            'items' => InvItem::all(),
        ]);
    }
}
