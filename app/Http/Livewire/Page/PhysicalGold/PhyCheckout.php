<?php

namespace App\Http\Livewire\Page\PhysicalGold;

use App\Models\GoldbarOwnership;
use App\Models\InvInfo;
use Livewire\Component;

class PhyCheckout extends Component
{
    public $prod_qty, $type, $totalGoldbar, $goldbar063, $goldbar064, $total, $totalW;
    public $info_bar063, $info_bar064;


    public function mount()
    {
        $this->totalGoldbar = GoldbarOwnership::where('user_id', auth()->user()->id)->where('active_ownership', 1)->get();
        $this->info_bar063 = InvInfo::where('user_id', 10)->where('prod_weight', 0.25)->first();
        $this->info_bar064 = InvInfo::where('user_id', 10)->where('prod_weight', 1)->first();

        foreach ($this->totalGoldbar as $tGold) {
            $this->total += $tGold->weight;
        }

        $this->goldbar063 = 0;
        $this->goldbar064 = 0;
    }

    public function exitProd($prod_qty, $type)
    {
        if ($type == "1.00") {
            if ((($this->goldbar064 + ($prod_qty)) + ($this->goldbar063 * 0.25)) > $this->total) {
                session()->flash('error');
                session()->flash('title', 'Invalid Quantity!');
                session()->flash('message', 'You cannot exceed more than what you own.');
            } else
                $this->goldbar064 = $this->goldbar064 + ($prod_qty);
        }
        if ($type == "0.25") {
            if (((($this->goldbar063 + ($prod_qty)) * 0.25) + $this->goldbar064) > $this->total) {
                session()->flash('error');
                session()->flash('title', 'Invalid Quantity!');
                session()->flash('message', 'You cannot exceed more than what you own.');
            } else
                $this->goldbar063 = $this->goldbar063 + ($prod_qty);
        }
    }

    public function convert()
    {
        $cart = collect([
            ['prod_name' => $this->info_bar064->prod_name, 'prod_img' => $this->info_bar064->prod_img1, 'prod_weight' => $this->info_bar064->prod_weight, 'qty' => $this->goldbar064],
            ['prod_name' => $this->info_bar063->prod_name, 'prod_img' => $this->info_bar063->prod_img1, 'prod_weight' => $this->info_bar063->prod_weight, 'qty' => $this->goldbar063],
        ]);

        $total =  $this->goldbar063 +  $this->goldbar064;

        $totalW =  ($this->info_bar063->prod_weight * $this->goldbar063) +  ($this->info_bar064->prod_weight * $this->goldbar064);
        session()->flash('products', $cart);
        session()->flash('total', $total);
        session()->flash('totalWeight', $totalW);

        return redirect('physical-gold-confirmation');
    }

    public function render()
    {
        $goldtype = InvInfo::orWhere(function ($query) {
            $query->where('prod_weight', 0.25)
                ->orWhere('prod_weight', 1);
        })
            ->where('user_id', 10)
            ->orderBy('prod_weight', 'desc')
            ->get();

        return view('livewire.page.physical-gold.phy-checkout', [
            'gtype' => $goldtype,
        ]);
    }
}
