<?php

namespace App\Http\Livewire\Page\PhysicalGold;

use App\Models\ArrahnuDailyPrice;
use App\Models\ArrahnuRefProductCode;
use App\Models\GoldbarOwnership;
use App\Models\InvCart;
use App\Models\KoputraCif;
use App\Models\MarketPrice;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ArrahnuPawn extends Component
{
    public $GoldMintGram, $GoldMint, $total, $totalD, $totalWallet, $MintingCost, $spotPrice;
    public $GoldMintGramD, $goldprice, $gold_types, $financing, $total_marhun, $marhun, $duration;

    public function mount()
    {
        $this->goldprice = 0;
        $this->gold_types = ArrahnuDailyPrice::fetchTodayGoldPriceDetails();

        if ($this->gold_types) {
            $this->goldprice = $this->gold_types['17   '];
        }

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

        $this->totalWallet = $this->total + $this->totalD;
        $this->GoldMint = InvCart::where('user_id', auth()->user()->id)->where('exit_type', 4)->first();

        $this->GoldMintGram = 0;
        $this->GoldMintGramD = 0;

        $user_id = auth()->user()->id;
        $existFlag = KoputraCif::where('created_by', $user_id)->first();

        if (!$existFlag) {
            $sql = DB::connection('arrahnudb')->select("EXEC ARRAHNU.sp_ar_insert_cust_kap_to_cif '$user_id', 'W1'");
        }
    }


    public function calculateFinancing()
    {
        $products = ArrahnuRefProductCode::fetchActiveArrahnuProducts();
        if ($this->gold_types) {
            foreach ($products as $code => $product) {
                $this->financing[trim($code)]['name'] = $product['description'];
                $this->financing[trim($code)]['max_financing'] = Money(MoneyRound(MoneyToFloat($this->marhun) * (MoneyToFloat($product['margin']) / 100)));
                $this->financing[trim($code)]['one_month'] = Money(MoneyRound(MoneyToFloat($this->financing[trim($code)]['max_financing']) * (MoneyToFloat($product['profit']) / 100) * (1 / 12)));
                $this->financing[trim($code)]['full_month'] = Money(MoneyRound(MoneyToFloat($this->financing[trim($code)]['max_financing']) * (MoneyToFloat($product['profit']) / 100) * (18 / 12)));
            }
        }
    }

    public function next()
    {
        $data = $this->validate([
            'GoldMintGram'              => ['numeric'],
            'GoldMintGramD'             => ['numeric'],
        ]);

        if ($this->gold_types) {

            if (($this->GoldMintGram + $this->GoldMintGramD)  >= 1) {
                $totalSpotGold = $this->goldprice['price'] * $this->GoldMintGram;
                $totalDigitalGold = $this->goldprice['price'] * $this->GoldMintGramD;

                $cart = collect([
                    (object)['prod_name' => 'Kasih AP Spot Gold', 'grammage' => $this->GoldMintGram, 'tot_price' => $totalSpotGold, 'spot_gold' => 1],
                    (object)['prod_name' => 'Kasih AP Digital Gold', 'grammage' => $this->GoldMintGramD, 'tot_price' => $totalDigitalGold, 'spot_gold' => 0],
                ]);

                $total =  $totalSpotGold +  $totalDigitalGold;

                $totalW =  $this->GoldMintGram +  $this->GoldMintGramD;

                session()->flash('products', $cart);
                session()->flash('total', $total);
                session()->flash('totalWeight', $totalW);

                return redirect('arrahnu-pawn-checkout');
            } else
                $this->emit('message', 'The total weight must be 1 gram and above!');
        } else {
            session()->flash('error');
            session()->flash('title', 'Disabled!');
            session()->flash('message', 'Pawn is unavaible to be used if there are no daily price setted up');
        }
    }

    public function render()
    {
        if (is_numeric($this->GoldMintGram)) {
            if ($this->gold_types) {
                $this->marhun = ($this->GoldMintGram + $this->GoldMintGramD) * $this->goldprice['price'];
            }
            $this->calculateFinancing();
        }

        return view('livewire.page.physical-gold.arrahnu-pawn')->extends('default.default');
    }
}
