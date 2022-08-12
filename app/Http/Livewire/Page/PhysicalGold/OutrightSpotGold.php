<?php

namespace App\Http\Livewire\Page\PhysicalGold;

use App\Models\GoldbarOwnership;
use App\Models\InvCart;
use App\Models\MarketPrice;
use Livewire\Component;

class OutrightSpotGold extends Component
{
    public $GoldMintGram, $GoldMint, $total, $MintingCost, $spotPrice;

    public function mount()
    {

        $totalGoldbar = GoldbarOwnership::where('user_id', auth()->user()->id)->where('active_ownership', 1)->where('spot_gold', 1)->get();
        $this->spotPrice = MarketPrice::where('item_id', 12)->first();

        foreach ($totalGoldbar as $tGold) {
            $this->total += $tGold->available_weight;
        }

        $this->GoldMint = InvCart::where('user_id', auth()->user()->id)->where('exit_type', 4)->first();

        if (!$this->GoldMint) {
            $this->GoldMintGram = 0;
        } else {
            $this->GoldMintGram = $this->GoldMint->prod_gram;
        }
    }

    public function next()
    {
        if ($this->GoldMintGram >= 1) {
            return redirect('outright-sg');
        } else
            $this->emit('message', 'The total weight must be 1 gram and above!');
    }

    public function render()
    {


        $this->MintingCost = 0;

        $this->GoldMint = InvCart::where('user_id', auth()->user()->id)->where('exit_type', 4)->first();

        $this->MintingCost = 0;




        if (!$this->GoldMint) {

            if ($this->GoldMintGram >= 1 && ($this->GoldMintGram < $this->total)) {
                InvCart::create(
                    [
                        'user_id'       => auth()->user()->id,
                        'item_id'       => 12,
                        'prod_qty'      => 1,
                        'prod_gram'     => $this->GoldMintGram,
                        'exit_type'     => 4,
                        'created_by'    => auth()->user()->id,
                        'updated_by'    => auth()->user()->id,
                        'created_at'    => now(),
                        'updated_at'    => now(),
                    ]
                );
            } else if ($this->GoldMintGram > $this->total) {
                session()->flash('error');
                session()->flash('title', 'Invalid Quantity!');
                session()->flash('message', 'You cannot exceed more than what you own.');
                $this->GoldMintGram = 0;
            } else
                $this->GoldMintGram = 0;
        } else {
            if ($this->total >= $this->GoldMintGram) {

                if ($this->GoldMintGram > 0) {
                    $this->GoldMint->prod_gram = $this->GoldMintGram;
                    $this->GoldMint->save();
                } else {
                    $this->GoldMint->delete();
                }
            } else {
                session()->flash('error');
                session()->flash('title', 'Invalid Quantity!');
                session()->flash('message', 'You cannot exceed more than what you own.');
                $this->GoldMintGram = $this->GoldMint->prod_gram;
            }
        }

        return view('livewire.page.physical-gold.outright-spot-gold')->extends('default.default');
    }
}
