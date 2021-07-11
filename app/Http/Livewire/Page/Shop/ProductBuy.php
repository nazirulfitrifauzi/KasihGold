<?php

namespace App\Http\Livewire\Page\Shop;

use App\Models\CommissionDetailKap;
use App\Models\Goldbar;
use App\Models\GoldbarOwnership;
use App\Models\GoldbarOwnershipPending;
use Illuminate\Support\Str;
use App\Models\InvCart;
use App\Models\InvMaster;
use App\Models\NewOrders;
use App\Models\States;
use App\Models\ToyyibBills;
use Illuminate\Support\Facades\Http;
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
        $total = 0.0;

        if (auth()->user()->client == '2') {

            foreach ($products as $prod) { // Count total price for the transaction
                $total += $prod->products->prod_price * $prod->prod_qty;
            }
            $refPayment = (string) Str::uuid();

            $option = array(
                'userSecretKey' => config('toyyibpay.key'),
                'categoryCode' => config('toyyibpay.category'),
                'billName' => 'Kasih AP Digital',
                'billDescription' => 'Digital Gold Purchase',
                'billPriceSetting' => 1,
                'billPayorInfo' => 1,
                'billAmount' => ($total * 100),
                'billReturnUrl' => route('toyyibpay-status-buy'),
                'billCallbackUrl' => route('toyyibpay-callback'),
                'billExternalReferenceNo' => $refPayment,
                'billTo' => auth()->user()->name,
                'billEmail' => auth()->user()->email,
                'billPhone' => auth()->user()->profile->phone1,
                'billSplitPayment' => 0,
                'billSplitPaymentArgs' => '',
                'billPaymentChannel' => '0',
                'billContentEmail' => 'Thank you for purchasing our product!',
                'billChargeToCustomer' => 1
            );

            $url = 'https://dev.toyyibpay.com/index.php/api/createBill';
            $response = Http::asForm()->post($url, $option);
            $billCode = $response[0]['BillCode'];

            // ToyyibBills::create([
            //     'ref_payment'       => $refPayment,
            //     'bill_code'         => $billCode,
            //     'bill_amount'       => $total,
            //     'status'            => 2,
            //     'created_by'        => auth()->user()->id,
            //     'updated_by'        => auth()->user()->id,
            //     'created_at'        => now(),
            //     'updated_at'        => now(),
            // ]);

            foreach ($products as $prod) { //Filling all these request to Goldbar Ownership Pending
                // Search for available gold bar to be filled
                $goldbar = Goldbar::where('weight_vacant', '>=', $prod->products->prod_weight)->first();
                for ($i = 0; $i < $prod->prod_qty; $i++) {
                    GoldbarOwnershipPending::create([
                        'referenceNumber'   => $billCode,
                        'gold_id'           => $goldbar->id,
                        'user_id'           => auth()->user()->id,
                        'weight'            => $prod->products->prod_weight,
                        'bought_price'      => $prod->products->prod_price,
                        'status'            => 2,
                        'created_by'        => auth()->user()->id,
                        'updated_by'        => auth()->user()->id,
                        'created_at'        => now(),
                        'updated_at'        => now(),
                    ]);

                    // update available gold bar weight
                    // Goldbar::where('id', $goldbar->gold_id)
                    //     ->update(array(
                    //         'weight_on_hold'    => ($goldbar->weight_on_hold + $prod->products->prod_weight),
                    //         'weight_vacant'     => ($goldbar->weight_vacant - $prod->products->prod_weight),
                    //     ));

                    $currentGoldbar = Goldbar::where('id', $goldbar->id)->first();

                    $currentGoldbar->weight_on_hold += $prod->products->prod_weight;
                    $currentGoldbar->weight_vacant -= $prod->products->prod_weight;
                    $currentGoldbar->save();

                    // distribute commission/cashback to the upline user
                    if (auth()->user()->isUserKAP()) {
                        $commission = $prod->products->item->commissionKAP->agent_rate;
                        $upline_id = auth()->user()->upline->user->id;

                        CommissionDetailKap::create([
                            'user_id'           => $upline_id,
                            'item_id'           => $prod->products->item->id,
                            'bought_id'         => auth()->user()->id,
                            'commission'        => $commission,
                            'created_by'        => auth()->user()->id,
                            'updated_by'        => auth()->user()->id,
                            'created_at'        => now(),
                            'updated_at'        => now(),
                        ]);
                    }
                }
                $prod->delete();
            }

            return redirect('https://dev.toyyibpay.com/' . $billCode);

            // $_SERVER['SERVER_PORT'] == 80;
            // $returnUrl = sprintf("%s://%s", 'http', $_SERVER['HTTP_HOST']);
            // $returnUrl .= "localhost:8000/pay2";
            // $returnUrl = "/home";
            // session()->flash('agency', 'KASIHGOLD');
            // session()->flash('refNo', $refNumber);
            // session()->flash('amount', $total);
            // session()->flash('email', auth()->user()->email);
            // session()->flash('returnUrl', $returnUrl);



            // return redirect()->route('snapBuy');

            // $url = 'https://prod.snapnpay.co/payments/api';

            // $response = Http::asForm()->post($url, $bill);

            // session()->flash('success');
            // session()->flash('title', 'Success!');
            // session()->flash('message', 'Product successfully added to your Gold Shelf!');
            // return redirect()->to('/home');
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
