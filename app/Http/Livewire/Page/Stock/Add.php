<?php

namespace App\Http\Livewire\Page\Stock;

use App\Models\InvCategory;
use App\Models\InvItem;
use App\Models\InvItemType;
use App\Models\Profile_nominee;
use Livewire\Component;

class Add extends Component
{
    public $categoryCode, $categoryName;
    public $typeParent, $typeCode, $typeName, $typePurity;
    public $itemParent, $itemCode, $itemName;

    public function addCategory()
    {
        $data = $this->validate([
            'categoryCode' => 'required|min:3',
            'categoryName' => 'required|min:3',
        ]);

        // automatically add code based on last entry on db
        // $code = InvCategory::orderBy('id', 'desc')->take(1)->value('id');

        InvCategory::create([
            'user_id'       => auth()->user()->id,
            // 'code'          => sprintf('%03d', ($code == NULL ? 0 : $code) + 1),
            'code'          => $this->categoryCode,
            'name'          => strtoupper($this->categoryName),
            'created_by'    => auth()->user()->id,
            'created_at'    => now(),
        ]);

        $this->categoryCode = "";
        $this->categoryName = "";

        session()->flash('success');
        session()->flash('title', 'Success!');
        session()->flash('message', 'Category successfully added.');
    }

    public function addType()
    {
        $data = $this->validate([
            'typeParent'    => 'required',
            'typeCode'      => 'required|min:3',
            'typeName'      => 'required|min:3',
        ]);

        // automatically add code based on last entry on db
        // $code = InvItemType::orderBy('id', 'desc')->take(1)->value('id');

        InvItemType::create([
            'user_id'       => auth()->user()->id,
            'category_id'   => $this->typeParent,
            'code'          => $this->typeCode,
            // 'code'          => sprintf('%03d', ($code == NULL ? 0 : $code) + 1),
            'name'          => strtoupper($this->typeName),
            'purity'        => ($this->typePurity == '') ? NULL : strtoupper($this->typePurity),
            'created_by'    => auth()->user()->id,
            'created_at'    => now(),
        ]);

        $this->typeParent = 0;
        $this->typeCode = "";
        $this->typeName = "";
        $this->typePurity = "";

        session()->flash('success');
        session()->flash('title', 'Success!');
        session()->flash('message', 'Type successfully added.');
    }

    public function addItem()
    {
        $data = $this->validate([
            'itemParent'    => 'required',
            'itemCode'      => 'required|min:3',
            'itemName'      => 'required|min:3',
        ]);

        // automatically add code based on last entry on db
        // $code = InvItem::orderBy('id', 'desc')->take(1)->value('id');

        InvItem::create([
            'user_id'           => auth()->user()->id,
            'item_type_id'      => $this->itemParent,
            // 'code'              => sprintf('%03d', ($code == NULL ? 0 : $code) + 1),
            'code'              => $this->itemCode,
            'name'              => strtoupper($this->itemName),
            'created_by'        => auth()->user()->id,
            'created_at'        => now(),
        ]);

        $this->itemParent = 0;
        $this->itemCode = "";
        $this->itemName = "";

        session()->flash('success');
        session()->flash('title', 'Success!');
        session()->flash('message', 'Item successfully added.');
    }

    public function render()
    {
        return view('livewire.page.stock.add', [
            'categories' => InvCategory::all(),
            'types' => InvItemType::all(),
            'items' => InvItem::all(),
        ]);
    }
}
