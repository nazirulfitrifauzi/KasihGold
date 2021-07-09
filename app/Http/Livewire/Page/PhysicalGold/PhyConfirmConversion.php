<?php

namespace App\Http\Livewire\Page\PhysicalGold;

use App\Models\GoldbarOwnership;
use App\Models\PhysicalConvert;
use App\Models\States;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class PhyConfirmConversion extends Component
{

    public $name, $phone1, $address1, $address2, $address3, $postcode, $town, $state, $membership_id, $data;
    public $states;

    public function mount()
    {
        $this->states = States::all();

        $this->membership_id = auth()->user()->profile->membership_id ?? "";

        $this->name = auth()->user()->name;
        $this->phone1 = auth()->user()->profile->phone1 ?? "";
        $this->address1 = auth()->user()->profile->address1 ?? "";
        $this->address2 = auth()->user()->profile->address2 ?? "";
        $this->address3 = auth()->user()->profile->address3 ?? "";
        $this->postcode = auth()->user()->profile->postcode ?? "";
        $this->town = auth()->user()->profile->town ?? "";
        $this->state = auth()->user()->profile->state_id ?? 0;

        $this->data = request()->session()->get('products');
    }

    public function convert()
    {
        $quarter_gram = 0;
        $one_gram = 0;

        foreach ($this->data as $product) {

            if ($product['prod_weight'] == 0.25) {
                $quarter_gram = $product['qty'];
            } elseif ($product['prod_weight'] == 1) {
                $one_gram = $product['qty'];
            }
            if ($product['qty'] != 0) {
                for ($i = 0; $i < $product['qty']; $i++) {
                    $gold = GoldbarOwnership::where('user_id', auth()->user()->id)
                        ->where('weight', $product['prod_weight'])
                        ->where('active_ownership', 1)
                        ->first();

                    if ($gold) {
                        $gold->update(array(
                            'active_ownership' => 0,
                        ));
                    }
                }
            }
        }


        $option = array(
            'userSecretKey' => config('toyyibpay.key'),
            'categoryCode' => config('toyyibpay.category'),
            'billName' => 'Kasih AP Digital',
            'billDescription' => 'Digital Gold to Physical Gold Conversion Postage Fee',
            'billPriceSetting' => 1,
            'billPayorInfo' => 1,
            'billAmount' => 1000, // Dikira dalam bentuk sen. Maksudnya dekat sini RM10
            'billReturnUrl' => route('toyyibpay-status-conv'),
            'billCallbackUrl' => route('toyyibpay-callback'),
            'billExternalReferenceNo' => 'KAP21345411',
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

        PhysicalConvert::create([
            'user_id'       => auth()->user()->id,
            'one_gram'      => $one_gram,
            'quarter_gram'  => $quarter_gram,
            'ref_payment'   => $billCode,
            'status'        => 2,
            'name'          => $this->name,
            'phone1'        => $this->phone1,
            'address1'      => $this->address1,
            'address2'      => $this->address2,
            'address3'      => $this->address3,
            'postcode'      => $this->postcode,
            'town'          => $this->town,
            'state'         => $this->state,
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        return redirect('https://dev.toyyibpay.com/' . $billCode);
    }

    public function render()
    {
        return view('livewire.page.physical-gold.phy-confirm-conversion');
    }
}
