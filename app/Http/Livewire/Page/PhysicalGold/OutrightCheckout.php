<?php

namespace App\Http\Livewire\Page\PhysicalGold;

use App\Models\GoldbarOwnership;
use App\Models\InvCart;
use App\Models\InvInfo;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class OutrightCheckout extends Component
{

    public $prod_qty, $type, $goldbar061, $goldbar063, $goldbar062, $goldbar064, $goldbar065, $gb61, $gb62, $gb63, $gb64, $gb65, $total, $total_weight, $buybackStatus;
    public $info_bar061, $info_bar062, $info_bar063, $info_bar064, $info_bar065;
    public $goldOwnership;

    public function mount()
    {



        $this->info_bar061 = InvInfo::where('user_id', 10)->where('prod_weight', 0.01)->first();
        $this->info_bar062 = InvInfo::where('user_id', 10)->where('prod_weight', 0.1)->first();
        $this->info_bar063 = InvInfo::where('user_id', 10)->where('prod_weight', 0.25)->first();
        $this->info_bar064 = InvInfo::where('user_id', 10)->where('prod_weight', 1)->first();
        $this->info_bar065 = InvInfo::where('user_id', 10)->where('prod_weight', 4.25)->first();

        $this->goldbar061 = GoldbarOwnership::where('user_id', auth()->user()->id)->where('weight', 0.01)->where('active_ownership', 1)->count();
        $this->goldbar062 = GoldbarOwnership::where('user_id', auth()->user()->id)->where('weight', 0.1)->where('active_ownership', 1)->count();
        $this->goldbar063 = GoldbarOwnership::where('user_id', auth()->user()->id)->where('weight', 0.25)->where('active_ownership', 1)->count();
        $this->goldbar064 = GoldbarOwnership::where('user_id', auth()->user()->id)->where('weight', 1)->where('active_ownership', 1)->count();
        $this->goldbar065 = GoldbarOwnership::where('user_id', auth()->user()->id)->where('weight', 4.25)->where('active_ownership', 1)->count();


        $this->gb61 = $this->goldbar061;
        $this->gb62 = $this->goldbar062;
        $this->gb63 = $this->goldbar063;
        $this->gb64 = $this->goldbar064;
        $this->gb65 = $this->goldbar065;

        $this->goldbar061 = 0;
        $this->goldbar062 = 0;
        $this->goldbar063 = 0;
        $this->goldbar064 = 0;
        $this->goldbar065 = 0;

        $this->buybackStatus = 0;
    }

    public function exitProdAdd($type)
    {
        $gold = GoldbarOwnership::where('user_id', auth()->user()->id)->where('item_id', $type)->where('active_ownership', 1)->first();
        $goldQty = GoldbarOwnership::where('user_id', auth()->user()->id)->where('item_id', $type)->groupBy('item_id')->select('item_id', DB::raw('count(*) as total'))->first();

        if ($gold->cart) {

            $outCart = $gold->cart->where('exit_type', 1)->where('item_id', $type)->first();
            if ($outCart) {

                if ($goldQty->total > $outCart->prod_qty) {
                    $outCart->prod_qty += 1;
                    $outCart->save();
                }
            } else {
                InvCart::create(
                    [
                        'user_id'       => auth()->user()->id,
                        'item_id'       => $type,
                        'prod_qty'      => 1,
                        'exit_type'     => 1,
                        'created_by'    => auth()->user()->id,
                        'updated_by'    => auth()->user()->id,
                        'created_at'    => now(),
                        'updated_at'    => now(),
                    ]
                );
            }
        } else {
            InvCart::create(
                [
                    'user_id'       => auth()->user()->id,
                    'item_id'       => $type,
                    'prod_qty'      => 1,
                    'exit_type'     => 1,
                    'created_by'    => auth()->user()->id,
                    'updated_by'    => auth()->user()->id,
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ]
            );
        }
    }

    public function exitProdSub($type)
    {

        $gold = GoldbarOwnership::where('user_id', auth()->user()->id)->where('item_id', $type)->where('active_ownership', 1)->first();

        if ($gold->cart) {

            $outCart = $gold->cart->where('exit_type', 1)->where('item_id', $type)->first();
            if ($outCart) {

                if ($outCart->prod_qty != 1) {
                    $outCart->prod_qty -= 1;
                    $outCart->save();
                } else
                    $outCart->delete();
            }
        }
    }




    public function buyback()
    {
        if ($this->buybackStatus == 1) {
            $this->buybackStatus = 0;
        } else if ($this->buybackStatus == 0) {
            $this->buybackStatus = 1;
        }
    }


    public function outright()
    {
        $total = ($this->info_bar061->outright_price * $this->goldbar061) + ($this->info_bar062->outright_price * $this->goldbar062) + ($this->info_bar063->outright_price * $this->goldbar063) + ($this->info_bar064->outright_price * $this->goldbar064) + ($this->info_bar065->outright_price * $this->goldbar065);
        if ($this->total_weight >= 1) {
            if ($this->buybackStatus == 1) {
                $cart = collect([
                    ['prod_name' => $this->info_bar065->prod_name, 'prod_price' => $this->info_bar065->outright_price, 'prod_img' => $this->info_bar065->prod_img1, 'type' => $this->info_bar065->prod_weight, 'qty' => $this->goldbar065],
                    ['prod_name' => $this->info_bar064->prod_name, 'prod_price' => $this->info_bar064->outright_price, 'prod_img' => $this->info_bar064->prod_img1, 'type' => $this->info_bar064->prod_weight, 'qty' => $this->goldbar064],
                    ['prod_name' => $this->info_bar063->prod_name, 'prod_price' => $this->info_bar063->outright_price, 'prod_img' => $this->info_bar063->prod_img1, 'type' => $this->info_bar063->prod_weight, 'qty' => $this->goldbar063],
                    ['prod_name' => $this->info_bar062->prod_name, 'prod_price' => $this->info_bar062->outright_price, 'prod_img' => $this->info_bar062->prod_img1, 'type' => $this->info_bar062->prod_weight, 'qty' => $this->goldbar062],
                    ['prod_name' => $this->info_bar061->prod_name, 'prod_price' => $this->info_bar061->outright_price, 'prod_img' => $this->info_bar061->prod_img1, 'type' => $this->info_bar061->prod_weight, 'qty' => $this->goldbar061],
                ]);
                session()->flash('outright', 0);
            } else if ($this->buybackStatus == 0) {
                $cart = collect([
                    ['prod_name' => $this->info_bar065->prod_name, 'prod_price' => $this->info_bar065->outright_price, 'prod_img' => $this->info_bar065->prod_img1, 'type' => $this->info_bar065->prod_weight, 'qty' => $this->goldbar065],
                    ['prod_name' => $this->info_bar064->prod_name, 'prod_price' => $this->info_bar064->outright_price, 'prod_img' => $this->info_bar064->prod_img1, 'type' => $this->info_bar064->prod_weight, 'qty' => $this->goldbar064],
                    ['prod_name' => $this->info_bar063->prod_name, 'prod_price' => $this->info_bar063->outright_price, 'prod_img' => $this->info_bar063->prod_img1, 'type' => $this->info_bar063->prod_weight, 'qty' => $this->goldbar063],
                    ['prod_name' => $this->info_bar062->prod_name, 'prod_price' => $this->info_bar062->outright_price, 'prod_img' => $this->info_bar062->prod_img1, 'type' => $this->info_bar062->prod_weight, 'qty' => $this->goldbar062],
                    ['prod_name' => $this->info_bar061->prod_name, 'prod_price' => $this->info_bar061->outright_price, 'prod_img' => $this->info_bar061->prod_img1, 'type' => $this->info_bar061->prod_weight, 'qty' => $this->goldbar061],
                ]);
                session()->flash('outright', 1);
            }
            session()->flash('products', $cart);
            session()->flash('total', $total);

            return redirect('bb-gold-cart');
        } else
            $this->emit('message', 'The total weight must be 1 gram and above!');
    }

    public function render()
    {
        $this->total_weight = 0;
        if ($this->goldbar064 > $this->gb64) {
            session()->flash('error');
            session()->flash('title', 'Invalid Quantity!');
            session()->flash('message', 'You cannot exceed more than what you own.');
            $this->goldbar064 = $this->gb64;
        }
        if ($this->goldbar063 > $this->gb63) {
            session()->flash('error');
            session()->flash('title', 'Invalid Quantity!');
            session()->flash('message', 'You cannot exceed more than what you own.');
            $this->goldbar063 = $this->gb63;
        }
        if ($this->goldbar062 > $this->gb62) {
            session()->flash('error');
            session()->flash('title', 'Invalid Quantity!');
            session()->flash('message', 'You cannot exceed more than what you own.');
            $this->goldbar062 = $this->gb62;
        }
        if ($this->goldbar061 > $this->gb61) {
            session()->flash('error');
            session()->flash('title', 'Invalid Quantity!');
            session()->flash('message', 'You cannot exceed more than what you own.');
            $this->goldbar061 = $this->gb61;
        }
        if ($this->goldbar065 > $this->gb65) {
            session()->flash('error');
            session()->flash('title', 'Invalid Quantity!');
            session()->flash('message', 'You cannot exceed more than what you own.');
            $this->goldbar065 = $this->gb65;
        }

        $goldtype = InvInfo::all();
        $this->goldOwnership = GoldbarOwnership::where('user_id', auth()->user()->id)->groupBy('item_id')->select('item_id', DB::raw('count(*) as total'))->get();

        $cartInfo = InvCart::where('user_id', auth()->user()->id)->where('exit_type', 1)->get();
        foreach ($cartInfo as $cartItems) {
            dump($cartItems->products->prod_weight);
            dump($cartItems->prod_qty);
        }
        $this->total_weight =  0;

        // $goldOwnershipCnt = GoldbarOwnership::groupBy('item_id')->select('item_id', DB::raw('count(*) as total'))->get();
        // foreach ($goldOwnershipCnt as $items)
        //     dump($items);
        // foreach ($this->goldOwnership as $item) {
        // }
        return view('livewire.page.physical-gold.outright-checkout', [
            'gtype' => $goldtype,
            'goldO' => $this->goldOwnership,
        ]);
    }
}
