<?php

namespace App\Http\Livewire\Page;

use App\Models\InvCategory;
use App\Models\InvItem;
use App\Models\InvItemType;
use App\Models\InvMaster;
use App\Models\InvMasterHistory;
use App\Models\InvMovement;
use App\Models\InvSupplier;
use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
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
    public $stockSupplier;
    public $stockCustId;
    // public $stockUnit;
    public $stockSerial;
    public $stockShipDate;
    public $stockTrackingNo;
    // public $stockTotalOut;
    public $stockRemarks;

    // modal add category
    public $addCategoryName;

    // modal add type
    public $addTypeCategoryId;
    public $addTypeName;
    public $addTypeBrand;
    public $addTypePurity;

    // modal add item
    public $addItemTypeId;
    public $addItemName;

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

    public function addStockInOut()
    {
        // stock movement part
        if(auth()->user()->id == 1) // HQ user
        {
            $data = $this->validate([
                'stockStatus'       => 'required',
                'stockItem'         => 'required',
                'stockSupplier'     => 'required_if:stockStatus,==,1',
                'stockCustId'       => 'required_if:stockStatus,==,2',
                // 'stockUnit'         => 'required|integer',
                'stockSerial'       => 'required',
                'stockShipDate'     => 'required',
                'stockTrackingNo'   => 'required',
                // 'stockTotalOut'     => 'required|integer',
            ]);
        }
        else // other than HQ user
        {
            $data = $this->validate([
                'stockStatus'       => 'required',
                'stockItem'         => 'required',
                'stockCustId'       => 'required',
                // 'stockUnit'         => 'required|integer',
                'stockSerial'       => 'required',
                'stockShipDate'     => 'required',
                'stockTrackingNo'   => 'required',
                // 'stockTotalOut'     => 'required|integer',
            ]);
        }

        if($this->stockSupplier != NULL) {  // from supplier
            InvMovement::create([
                'status'        => $this->stockStatus,
                'item_id'       => $this->stockItem,
                'supplier_id'   => $this->stockSupplier,
                'from_user_id'  => NULL,
                'to_user_id'    => auth()->user()->id,
                // 'unit'          => $this->stockUnit,
                'serial_no'     => $this->stockSerial,
                'shipment_date' => $this->stockShipDate,
                'tracking_no'   => $this->stockTrackingNo,
                // 'total_out'     => $this->stockTotalOut,
                'remarks'       => $this->stockRemarks,
                'owner_id'      => auth()->user()->id,
                'created_by'    => auth()->user()->id,
                'created_at'    => now(),
            ]);
        } else { // not from supplier
            InvMovement::create([ // create for recorder first
                'status'        => $this->stockStatus,
                'item_id'       => $this->stockItem,
                'supplier_id'   => $this->stockSupplier,
                'from_user_id'  => auth()->user()->id,
                'to_user_id'    => $this->stockCustId,
                // 'unit'          => $this->stockUnit,
                'serial_no'     => $this->stockSerial,
                'shipment_date' => $this->stockShipDate,
                'tracking_no'   => $this->stockTrackingNo,
                // 'total_out'     => $this->stockTotalOut,
                'remarks'       => $this->stockRemarks,
                'owner_id'      => auth()->user()->id,
                'created_by'    => auth()->user()->id,
                'created_at'    => now(),
            ]);

            InvMovement::create([ //then create for receiver
                'status'        => ($this->stockStatus == 1) ? 2 : 1,
                'item_id'       => $this->stockItem,
                'supplier_id'   => $this->stockSupplier,
                'from_user_id'  => auth()->user()->id,
                'to_user_id'    => $this->stockCustId,
                // 'unit'          => $this->stockUnit,
                'serial_no'     => $this->stockSerial,
                'shipment_date' => $this->stockShipDate,
                'tracking_no'   => $this->stockTrackingNo,
                // 'total_out'     => $this->stockTotalOut,
                'remarks'       => $this->stockRemarks,
                'owner_id'      => $this->stockCustId,
                'created_by'    => auth()->user()->id,
                'created_at'    => now(),
            ]);
        }
        // end stock movement part

        // inventory master part
        if ($this->stockSupplier != NULL) {  // from supplier (only in & only to hq)
            // create record on master
            InvMaster::create([
                'item_id'       => $this->stockItem,
                'user_id'       => auth()->user()->id,
                'serial_no'     => $this->stockSerial,
                'created_by'    => auth()->user()->id,
                'created_at'    => now(),
            ]);

            // create or update history ownership
            $no = InvMasterHistory::where('serial_no',$this->stockSerial) // get latest no
                                    ->orderBy('no', 'desc')
                                    ->take(1)
                                    ->value('no');

            $masterHistory = InvMasterHistory::updateOrCreate([
                'serial_no' => $this->stockSerial
            ],
            [
                'user_id'       => auth()->user()->id,
                'serial_no'     => $this->stockSerial,
                'no'            => $no + 1,
            ]);

            if ($masterHistory->wasRecentlyCreated) // $masterHistory perform create
            {
                InvMasterHistory::where('serial_no', $this->stockSerial)
                                ->where('no', $no + 1)
                                ->update([
                                    'created_by' => auth()->user()->id,
                                    'created_at' => now(),
                                ]);
            }

            if (!$masterHistory->wasRecentlyCreated && $masterHistory->wasChanged()) // $masterHistory perform update
            {
                InvMasterHistory::where('serial_no', $this->stockSerial)
                                ->where('no', $no + 1)
                                ->update([
                                    'updated_by' => auth()->user()->id,
                                    'updated_at' => now(),
                                ]);
            }
        } else { // not from supplier
            // update record on master (since record already there created by hq )
            InvMaster::where('serial_no', $this->stockSerial)->update([
                'user_id'       => $this->stockCustId,
                'updated_by'    => auth()->user()->id,
                'updated_at'    => now(),
            ]);

            // update history ownership
            $no = InvMasterHistory::where('serial_no', $this->stockSerial) // get latest no
                                    ->orderBy('no', 'desc')
                                    ->take(1)
                                    ->value('no');

            $masterHistory = InvMasterHistory::updateOrCreate(
                [
                    'serial_no' => $this->stockSerial
                ],
                [
                    'user_id'       => auth()->user()->id,
                    'serial_no'     => $this->stockSerial,
                    'no'            => $no + 1,
                ]
            );

            if ($masterHistory->wasRecentlyCreated) // $masterHistory perform create
            {
                InvMasterHistory::where('serial_no', $this->stockSerial)
                                ->where('no', $no + 1)
                                ->update([
                                    'created_by' => auth()->user()->id,
                                    'created_at' => now(),
                                ]);
            }

            if (!$masterHistory->wasRecentlyCreated && $masterHistory->wasChanged()) // $masterHistory perform update
            {
                InvMasterHistory::where('serial_no', $this->stockSerial)
                                ->where('no', $no + 1)
                                ->update([
                                    'updated_by' => auth()->user()->id,
                                    'updated_at' => now(),
                                ]);
            }
        }
        // end inventory master

        return redirect()->to('/stock/movement');
    }

    public function addCategory()
    {
        $data = $this->validate([
            'addCategoryName' => 'required|min:3',
        ]);

        $code = InvCategory::orderBy('id','desc')->take(1)->value('id');

        InvCategory::create([
            'user_id'       => auth()->user()->id,
            'code'          => sprintf('%03d', ($code == NULL ? 0 : $code ) + 1),
            'name'          => strtoupper($this->addCategoryName),
            'created_by'    => auth()->user()->id,
            'created_at'    => now(),
        ]);

        return redirect()->to('/stock/management');
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
            'code'          => sprintf('%03d', ($code == NULL ? 0 : $code) + 1),
            'name'          => strtoupper($this->addTypeName),
            'brand'         => ($this->addTypeBrand == '') ? NULL : strtoupper($this->addTypeBrand),
            'purity'        => ($this->addTypePurity == '') ? NULL : strtoupper($this->addTypePurity),
            'created_by'    => auth()->user()->id,
            'created_at'    => now(),
        ]);

        return redirect()->to('/stock/management');
    }

    public function addItem()
    {
        $data = $this->validate([
            'addItemTypeId' => 'required',
            'addItemName'   => 'required|min:3',
        ]);

        if ($this->addItemTypeId == '%') {

            $all_type = InvItemType::where('deleted_by', NULL)->get();

            foreach($all_type as $type) {

                $code = InvItem::orderBy('id', 'desc')->take(1)->value('id');

                InvItem::create([
                    'user_id'           => auth()->user()->id,
                    'item_type_id'      => $type->id,
                    'code'              => sprintf('%03d', ($code == NULL ? 0 : $code) + 1),
                    'name'              => strtoupper($this->addItemName),
                    'created_by'        => auth()->user()->id,
                    'created_at'        => now(),
                ]);
            }

        } else {
            $code = InvItem::orderBy('id', 'desc')->take(1)->value('id');

            InvItem::create([
                'user_id'           => auth()->user()->id,
                'item_type_id'      => $this->addItemTypeId,
                'code'              => sprintf('%03d', ($code == NULL ? 0 : $code) + 1),
                'name'              => strtoupper($this->addItemName),
                'created_by'        => auth()->user()->id,
                'created_at'        => now(),
            ]);
        }

        return redirect()->to('/stock/management');
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

        return redirect()->to('/stock/management');
    }

    public function render()
    {
        return view('livewire.page.stock', [
            // cards
            'categories' => InvCategory::where('user_id', auth()->user()->id)->get(),
            'types' => InvItemType::where('category_id', $this->categoryId)->where('user_id', auth()->user()->id)->get(),
            'items' => InvItem::where('item_type_id', $this->typeId)->where('user_id', auth()->user()->id)->get(),
            'masters' => InvMaster::where('user_id', auth()->user()->id)->where('item_id', $this->itemId)->get(),
            'suppliers' => InvSupplier::all(),
            // modal
            'stockTypes' => InvItemType::where('user_id', auth()->user()->id)->get(),
            'stockItems' => InvItem::where('user_id', auth()->user()->id)->get(),
            'stockMasters' => InvMaster::where('user_id', auth()->user()->id)->get(),
            'users' => User::where('role','!=','1')->get(),
        ]);
    }
}
