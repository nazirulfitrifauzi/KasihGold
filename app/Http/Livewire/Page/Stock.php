<?php

namespace App\Http\Livewire\Page;

use App\Models\InvCategory;
use App\Models\InvItem;
use App\Models\InvItemType;
use App\Models\InvMovement;
use App\Models\InvSupplier;
use Livewire\Component;

class Stock extends Component
{
    public $categoryActive;
    public $typeActive;
    public $itemActive;
    public $categoryId;
    public $typeId;
    public $itemId;

    // modal stock in out
    public $stockStatus;
    public $stockCategory;
    public $stockType;
    public $stockItem;

    // modal add category
    public $addCategoryName;

    // modal add type
    public $addTypeCategoryId;
    public $addTypeName;
    public $addTypeBrand;
    public $addTypePurity;

    // modal add item
    public $addItemTypeId;
    public $addItemSupplier;
    public $addItemName;
    public $addItemWeight;
    public $addItemUnit;
    public $addItemPrice;

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
        $data = $this->validate([
            'addCategoryName' => 'required|min:3',
        ]);

        $code = InvCategory::orderBy('id','desc')->take(1)->value('id');

        InvCategory::create([
            'user_id'       => auth()->user()->id,
            'code'          => sprintf('%09d', ($code == NULL ? 0 : $code ) + 1),
            'name'          => strtoupper($this->addCategoryName),
            'created_by'    => auth()->user()->id,
            'created_at'    => now(),
        ]);

        return redirect()->to('/stock');
    }

    public function addType()
    {
        $data = $this->validate([
            'addTypeCategoryId' => 'required',
            'addTypeName'       => 'required|min:3',
        ]);

        $code = InvItemType::orderBy('id', 'desc')->take(1)->value('id');

        InvItemType::create([
            'user_id'       => auth()->user()->id,
            'category_id'   => $this->addTypeCategoryId,
            'code'          => sprintf('%09d', ($code == NULL ? 0 : $code) + 1),
            'name'          => strtoupper($this->addTypeName),
            'brand'         => ($this->addTypeBrand == '') ? NULL : strtoupper($this->addTypeBrand),
            'purity'        => ($this->addTypePurity == '') ? NULL : strtoupper($this->addTypePurity),
            'created_by'    => auth()->user()->id,
            'created_at'    => now(),
        ]);

        return redirect()->to('/stock');
    }

    public function addItem()
    {
        $data = $this->validate([
            'addItemTypeId' => 'required',
            'addItemSupplier' => 'required',
            'addItemName'       => 'required|min:3',
        ]);

        $code = InvItem::orderBy('id', 'desc')->take(1)->value('id');

        InvItem::create([
        'user_id'               => auth()->user()->id,
            'item_type_id'      => $this->addItemTypeId,
            'supplier_id'       => $this->addItemSupplier,
            'code'              => sprintf('%09d', ($code == NULL ? 0 : $code) + 1),
            'name'              => strtoupper($this->addItemName),
            'weight'            => ($this->addItemWeight == '') ? NULL : strtoupper($this->addItemWeight),
            'unit'              => ($this->addItemUnit == '') ? NULL : $this->addItemUnit,
            'price_per_unit'    => ($this->addItemPrice == '') ? NULL : $this->addItemPrice,
            'created_by'        => auth()->user()->id,
            'created_at'        => now(),
        ]);

        return redirect()->to('/stock');
    }

    public function delete($scope, $id)
    {
        if($scope == 'category'){
            $table = 'App\Models\InvCategory';
        }
        elseif ($scope == 'type') {
            $table = 'App\Models\InvItemType';
        }
        elseif ($scope == 'item') {
            $table = 'App\Models\InvItem';
        }

        $table::whereId($id)->update(['deleted_by' => auth()->user()->id]);
        $table::whereId($id)->delete();

        return redirect()->to('/stock');
    }

    public function render()
    {
        return view('livewire.page.stock', [
            // cards
            'categories' => InvCategory::where('user_id', auth()->user()->id)->get(),
            'types' => InvItemType::where('category_id', $this->categoryId)->where('user_id', auth()->user()->id)->get(),
            'items' => InvItem::where('item_type_id', $this->typeId)->get(),
            // 'masters' => InvMovement::where('user_id', auth()->user()->id)->where('item_id', $this->itemId)->get(),
            'suppliers' => InvSupplier::all(),
            // modal
            'stockTypes' => InvItemType::where('category_id', $this->stockCategory)->get(),
            'stockItems' => InvItem::where('item_type_id', $this->stockType)->get(),
        ]);
    }
}
