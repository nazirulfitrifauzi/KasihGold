<?php

namespace App\Http\Livewire\Page\Shop;

use App\Models\InvMaster;
use App\Models\NewOrders;
use Livewire\Component;

class ProductBuy extends Component
{
    public $iid, $item_id;

    public function buy()
    {
        $masterProducts = InvMaster::join('inv_items', 'inv_items.id', '=', 'inv_masters.item_id')
            ->join('inv_info', 'inv_info.prod_code', '=', 'inv_items.code')
            ->where('inv_info.id', $this->iid)
            ->first();

        NewOrders::create([
            'user_id'       => auth()->user()->id,
            'item_id'       => $masterProducts->item_id,
            'quantity'      => 1,
            'created_by'    => auth()->user()->id,
            'updated_by'    => auth()->user()->id,
            'created_at'    => now(),
            'updated_at'    => now(),
            'user_name'     => auth()->user()->name,
            'fulfillment'   => 0,
        ]);
        session()->flash('message', 'Product successfully ordered! Awaiting for HQ approval!');
        return redirect()->to('/home');
    }

    public function render()
    {
        $masterProducts = InvMaster::join('inv_items', 'inv_items.id', '=', 'inv_masters.item_id')
            ->join('inv_info', 'inv_info.prod_code', '=', 'inv_items.code')
            ->where('inv_info.id', $this->iid)
            ->first();

        return view('livewire.page.shop.product-buy', [
            'prod' => $masterProducts,
        ]);
    }
}
