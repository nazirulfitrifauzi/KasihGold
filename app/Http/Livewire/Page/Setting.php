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
            //stock
            'categories' => InvCategory::all(),
            'types' => InvItemType::all(),
            'items' => InvItem::all(),
            // commision
            // 'commissions' => DB::select('select a.id, a.name, b.md_rate, b.agent_rate from inv_items a left join commission_rates b on a.id = b.item_id'),
        ]);
    }
}
