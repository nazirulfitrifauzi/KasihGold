<?php

namespace App\Http\Livewire\Page\Neworders;

use App\Models\InvMaster;
use App\Models\InvMovement;
use App\Models\NewOrders as ModelsNewOrders;
use Livewire\Component;

class NewOrders extends Component
{

    public $serial_no, $newOrders, $inv_master;
    public function approve()
    {
        $this->inv_master = InvMaster::where('serial_no', $this->serial_no)->first();
        $this->newOrders = ModelsNewOrders::where('item_id', $this->inv_master->item_id)->first();

        ModelsNewOrders::where('id', $this->newOrders->id)->update([
            'fulfillment'       => 1,
            'updated_by'        => auth()->user()->id,
            'updated_at'        => now(),
        ]);

        InvMaster::where('serial_no', $this->serial_no)->update([
            'user_id'           => $this->newOrders->user_id,
            'updated_by'        => auth()->user()->id,
            'updated_at'        => now(),
        ]);

        InvMovement::where('serial_no', $this->serial_no)->update([
            'from_user_id'      => $this->inv_master->user_id,
            'to_user_id'        => $this->newOrders->user_id,
            'updated_by'        => auth()->user()->id,
            'updated_at'        => now(),
        ]);
    }
    public function render()
    {
        return view('livewire.page.neworders.new-orders', [
            'orders' => ModelsNewOrders::where('fulfillment', 0)->get(),
            'inventory' => InvMaster::where('item_id', 17)->get(),
        ]);
    }
}
