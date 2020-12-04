<?php

namespace App\Http\Livewire\Page;

use App\Models\InvCategory;
use App\Models\InvItem;
use App\Models\InvItemType;
use App\Models\InvMovement;
use Livewire\Component;

class Stock extends Component
{
    public $categoryActive;
    public $typeActive;
    public $itemActive;
    public $categoryId;
    public $typeId;
    public $itemId;
    public $categoryName;

    protected $listeners = [
        'categorySelected',
        'typeSelected',
        'itemSelected'
    ];

    public function categorySelected($id)
    {
        $this->categoryActive = $id;
        $this->categoryId = $id;

        // zerorise type id to default
        $this->typeActive = null;
        $this->typeId = null;
        $this->itemActive = null;
        $this->itemId = null;
    }

    public function typeSelected($typeId)
    {
        $this->typeActive = $typeId;
        $this->typeId = $typeId;

        // zerorise type id to default
        $this->itemActive = null;
        $this->itemId = null;
    }

    public function itemSelected($itemId)
    {
        $this->itemActive = $itemId;
        $this->itemId = $itemId;
    }

    public function addCategory()
    {
        $this->emit('closeModal');
    }

    public function render()
    {
        return view('livewire.page.stock', [
            'categories' => InvCategory::all(),
            'types' => InvItemType::where('category_id', $this->categoryId)->get(),
            'items' => InvItem::where('item_type_id', $this->typeId)->get(),
            'masters' => InvMovement::where('user_id', auth()->user()->id)->where('item_id', $this->itemId)->get(),
        ]);
    }
}
