<?php

namespace App\Http\Livewire\Page\Shop;

use App\Models\Goldbar;
use App\Models\GoldbarOwnershipPending;
use App\Models\InvCart;
use App\Models\InvMaster;
use App\Models\NewOrders;
use App\Models\States;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class ProductBuy extends Component
{
    const PAYMENT_ENDPOINT = "https://prod.snapnpay.co/payments/api";
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
        $refNumber = uniqid(("KG"));
        $total = 0.0;

        if(auth()->user()->client == 2 && auth()->user()->role != 1) {
            foreach ($products as $prod) {
                $total += $prod->products->prod_price * $prod->prod_qty;
                // Search for available gold bar to be filled
                $goldbar = Goldbar::where('weight_vacant', '>=', $prod->products->prod_weight)->first();
                for ($i = 0; $i < $prod->prod_qty; $i++) {
                    GoldbarOwnershipPending::create([
                        'referenceNumber'   => $refNumber,
                        'gold_id'           => $goldbar->gold_id,
                        'user_id'           => auth()->user()->id,
                        'weight'            => $prod->products->prod_weight,
                        'status'            => 2,
                        'created_by'        => auth()->user()->id,
                        'updated_by'        => auth()->user()->id,
                        'created_at'        => now(),
                        'updated_at'        => now(),
                    ]);

                    // update available gold bar weight
                    Goldbar::where('gold_id', $goldbar->gold_id)
                        ->update(array(
                            'weight_on_hold'    => ($goldbar->weight_on_hold + $prod->products->prod_weight),
                            'weight_vacant'     => ($goldbar->weight_vacant - $prod->products->prod_weight),
                        ));
                }
                $prod->delete();
            }

            $bill = array(
                'agency'    => 'KASIHGOLD',
                'refNo'     =>  $refNumber,
                'amount'    =>  $total,
                'email'     => auth()->user()->email,
                'returnUrl' => "/pay2",
            );

            $url = 'https://prod.snapnpay.co/payments/api';
            $response = Http::asForm()->post($url, $bill);

            session()->flash('success');
            session()->flash('title', 'Success!');
            session()->flash('message', 'Product successfully added to your Gold Shelf!');
            return redirect()->to('/home');
        } else {
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
                $prod->delete();
            }

            session()->flash('success');
            session()->flash('title', 'Success!');
            session()->flash('message', 'Product successfully ordered! Awaiting for HQ approval!');
            return redirect()->to('/home');
        }

        // return redirect($url);
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
