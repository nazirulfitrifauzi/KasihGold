<?php

namespace App\Http\Livewire\Page\PhysicalGold;

use App\Models\GoldbarOwnership;
use App\Models\InvInfo;
use Livewire\Component;

class OutrightCheckout extends Component
{

    public $prod_qty, $type, $goldbar061, $goldbar063, $goldbar062, $goldbar064, $gb61, $gb62, $gb63, $gb64, $total, $total_weight, $buybackStatus;
    public $info_bar061, $info_bar062, $info_bar063, $info_bar064;

    public function mount()
    {
        $this->info_bar061 = InvInfo::where('user_id', 10)->where('prod_weight', 0.01)->first();
        $this->info_bar062 = InvInfo::where('user_id', 10)->where('prod_weight', 0.1)->first();
        $this->info_bar063 = InvInfo::where('user_id', 10)->where('prod_weight', 0.25)->first();
        $this->info_bar064 = InvInfo::where('user_id', 10)->where('prod_weight', 1)->first();

        $this->goldbar061 = GoldbarOwnership::where('user_id', auth()->user()->id)->where('weight', 0.01)->where('active_ownership', 1)->count();
        $this->goldbar062 = GoldbarOwnership::where('user_id', auth()->user()->id)->where('weight', 0.1)->where('active_ownership', 1)->count();
        $this->goldbar063 = GoldbarOwnership::where('user_id', auth()->user()->id)->where('weight', 0.25)->where('active_ownership', 1)->count();
        $this->goldbar064 = GoldbarOwnership::where('user_id', auth()->user()->id)->where('weight', 1)->where('active_ownership', 1)->count();


        $this->gb61 = $this->goldbar061;
        $this->gb62 = $this->goldbar062;
        $this->gb63 = $this->goldbar063;
        $this->gb64 = $this->goldbar064;

        $this->goldbar061 = 0;
        $this->goldbar062 = 0;
        $this->goldbar063 = 0;
        $this->goldbar064 = 0;

        $this->buybackStatus = 0;
    }

    public function exitProd($prod_qty, $type)
    {
        if ($type == "1.00") {
            if ($this->goldbar064 + ($prod_qty) > $this->gb64) {
                session()->flash('error');
                session()->flash('title', 'Invalid Quantity!');
                session()->flash('message', 'You cannot exceed more than what you own.');
            } else
                $this->goldbar064 = $this->goldbar064 + ($prod_qty);
        }
        if ($type == ".25") {
            if ($this->goldbar063 + ($prod_qty) > $this->gb63) {
                session()->flash('error');
                session()->flash('title', 'Invalid Quantity!');
                session()->flash('message', 'You cannot exceed more than what you own.');
            } else
                $this->goldbar063 = $this->goldbar063 + ($prod_qty);
        }
        if ($type == ".10") {
            if ($this->goldbar062 + ($prod_qty) > $this->gb62) {
                session()->flash('error');
                session()->flash('title', 'Invalid Quantity!');
                session()->flash('message', 'You cannot exceed more than what you own.');
            } else
                $this->goldbar062 = $this->goldbar062 + ($prod_qty);
        }
        if ($type == ".01") {
            if ($this->goldbar061 + ($prod_qty) > $this->gb61) {
                session()->flash('error');
                session()->flash('title', 'Invalid Quantity!');
                session()->flash('message', 'You cannot exceed more than what you own.');
            } else
                $this->goldbar061 = $this->goldbar061 + ($prod_qty);
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
        $total = ($this->info_bar061->outright_price * $this->goldbar061) + ($this->info_bar062->outright_price * $this->goldbar062) + ($this->info_bar063->outright_price * $this->goldbar063) + ($this->info_bar064->outright_price * $this->goldbar064);
        if ($this->total_weight >= 1) {
            if ($this->buybackStatus == 1) {
                $cart = collect([
                    ['prod_name' => $this->info_bar064->prod_name, 'prod_price' => $this->info_bar064->outright_price, 'prod_img' => $this->info_bar064->prod_img1, 'type' => $this->info_bar064->prod_weight, 'qty' => $this->goldbar064],
                    ['prod_name' => $this->info_bar063->prod_name, 'prod_price' => $this->info_bar063->outright_price, 'prod_img' => $this->info_bar063->prod_img1, 'type' => $this->info_bar063->prod_weight, 'qty' => $this->goldbar063],
                    ['prod_name' => $this->info_bar062->prod_name, 'prod_price' => $this->info_bar062->outright_price, 'prod_img' => $this->info_bar062->prod_img1, 'type' => $this->info_bar062->prod_weight, 'qty' => $this->goldbar062],
                    ['prod_name' => $this->info_bar061->prod_name, 'prod_price' => $this->info_bar061->outright_price, 'prod_img' => $this->info_bar061->prod_img1, 'type' => $this->info_bar061->prod_weight, 'qty' => $this->goldbar061],
                ]);
                session()->flash('outright', 0);
            } else if ($this->buybackStatus == 0) {
                $cart = collect([
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

        $this->total_weight = ($this->goldbar064 * $this->info_bar064->prod_weight)  + ($this->goldbar063 * $this->info_bar063->prod_weight) + ($this->goldbar062 * $this->info_bar062->prod_weight) + ($this->goldbar061 * $this->info_bar061->prod_weight);

        $goldtype = InvInfo::where('user_id', 10)->get();
        return view('livewire.page.physical-gold.outright-checkout', [
            'gtype' => $goldtype,
        ]);
    }
}
