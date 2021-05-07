<?php

namespace App\Http\Livewire\Page\Shop;

use App\Models\InvCart;
use App\Models\InvMaster;
use App\Models\NewOrders;
use App\Models\States;
use Livewire\Component;

class ProductBuy extends Component
{
    public $iid, $item_id;
    public $fname, $lname, $cname, $nric;
    public $address1, $address2, $address3, $town, $postcode, $state_id;

    public function mount()
    {
        $this->state               = States::all();
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'fname'               => 'required|string',
            'lname'               => 'required|string',
            'cname'               => 'required|string',
            'nric'                => 'required|digits:12',
            'address1'            => 'required|string',
            'address2'            => 'nullable|string',
            'address3'            => 'nullable|string',
            'town'                => 'required|string',
            'postcode'            => 'required|digits:5',
            'state_id'            => 'required|integer',
        ]);
    }

    public function buy()
    {
        $products = InvCart::where('user_id', auth()->user()->id)->get();

        foreach ($products as $prod) {
            NewOrders::create([
                'user_id'       => auth()->user()->id,
                'item_id'       => $prod->item_id,
                'quantity'      => $prod->prod_qty,
                'created_by'    => auth()->user()->id,
                'updated_by'    => auth()->user()->id,
                'created_at'    => now(),
                'updated_at'    => now(),
                'user_name'     => auth()->user()->name,
                'fulfillment'   => 0,
            ]);
        }
        session()->flash('message', 'Product successfully ordered! Awaiting for HQ approval!');
        return redirect()->to('/home');
    }

    public function render()
    {
        $products = InvCart::where('user_id', auth()->user()->id)->get();
        $tProducts = $products->count();

        return view('livewire.page.shop.product-buy', [
            'products' => $products,
            'tprod' => $tProducts,
        ]);
    }
}
