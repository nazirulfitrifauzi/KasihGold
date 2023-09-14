<?php

namespace App\Http\Livewire\Page\PhysicalGold;

use App\Models\ArrahnuDailyPrice;
use App\Models\GoldbarOwnership;
use App\Models\InvCart;
use App\Models\KoputraCif;
use App\Models\MarketPrice;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ArrahnuPawn extends Component
{
    public $GoldMintGram, $GoldMint, $total, $totalD, $MintingCost, $spotPrice;
    public $GoldMintGramD, $goldprice;

    public function mount()
    {
        $goldprice = ArrahnuDailyPrice::fetchTodayGoldPriceDetails();
        $this->goldprice = $goldprice['17   '];

        $this->total = 0;
        $this->totalD = 0;

        $totalGoldbar = GoldbarOwnership::where('user_id', auth()->user()->id)->where('active_ownership', 1)->where('spot_gold', 1)->get();
        $this->spotPrice = MarketPrice::where('item_id', 12)->first();

        foreach ($totalGoldbar as $tGold) {
            $this->total += $tGold->available_weight;
        }

        $totalGoldbarD = GoldbarOwnership::where('user_id', auth()->user()->id)->where('active_ownership', 1)->where('spot_gold', 0)->get();
        foreach ($totalGoldbarD as $tGold) {
            $this->totalD += $tGold->available_weight;
        }

        $this->GoldMint = InvCart::where('user_id', auth()->user()->id)->where('exit_type', 4)->first();

        $this->GoldMintGram = 0;
        $this->GoldMintGramD = 0;

        $user_id = auth()->user()->id;
        $existFlag = KoputraCif::where('created_by', $user_id)->first();

        if (!$existFlag) {
            $sql = DB::connection('arrahnudb')->select("EXEC ARRAHNU.sp_ar_insert_cust_kap_to_cif '$user_id', 'W1'");
        }
    }

    public function next()
    {
        if (($this->GoldMintGram + $this->GoldMintGramD)  >= 1) {
            $totalSpotGold = $this->goldprice['price'] * $this->GoldMintGram;
            $totalDigitalGold = $this->goldprice['price'] * $this->GoldMintGramD;

            $cart = collect([
                (object)['prod_name' => 'Kasih AP Digital Gold', 'grammage' => $this->GoldMintGram, 'tot_price' => $totalSpotGold, 'spot_gold' => 0],
                (object)['prod_name' => 'Kasih AP Spot Gold', 'grammage' => $this->GoldMintGramD, 'tot_price' => $totalDigitalGold, 'spot_gold' => 1],
            ]);

            $total =  $totalSpotGold +  $totalDigitalGold;

            $totalW =  $this->GoldMintGram +  $this->GoldMintGramD;

            session()->flash('products', $cart);
            session()->flash('total', $total);
            session()->flash('totalWeight', $totalW);

            return redirect('arrahnu-pawn-checkout');
        } else
            $this->emit('message', 'The total weight must be 1 gram and above!');
    }


    public function render()
    {

        return view('livewire.page.physical-gold.arrahnu-pawn')->extends('default.default');
    }
}
