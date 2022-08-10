<?php

namespace App\Http\Livewire\Page\PhysicalGold;

use App\Models\GoldbarOwnership;
use App\Models\InvCart;
use Livewire\Component;

class OutrightSpotGold extends Component
{
    public $GoldMintGram, $GoldMint, $total, $MintingCost;

    public function mount()
    {

        $totalGoldbar = GoldbarOwnership::where('user_id', auth()->user()->id)->where('active_ownership', 1)->where('spot_gold', 1)->get();

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
            return redirect('gm-checkout');
        } else
            $this->emit('message', 'The total weight must be 1 gram and above!');
    }

    public function render()
    {



        $roundedGrammage = (int)$this->total;
        $this->MintingCost = 0;

        $this->GoldMint = InvCart::where('user_id', auth()->user()->id)->where('exit_type', 4)->first();

        $this->MintingCost = 0;




        if (!$this->GoldMint) {

            if ($this->GoldMintGram != 0 && ($this->GoldMintGram >= $this->total)) {
                InvCart::create(
                    [
                        'user_id'       => auth()->user()->id,
                        'item_id'       => 9,
                        'prod_qty'      => $this->GoldMintGram,
                        'exit_type'     => 3,
                        'created_by'    => auth()->user()->id,
                        'updated_by'    => auth()->user()->id,
                        'created_at'    => now(),
                        'updated_at'    => now(),
                    ]
                );

                foreach ($MintingCost as $MC) {
                    if ($this->MintingCost == 0) {
                        if ($this->GoldMintGram >= $MC->range) {
                            $this->MintingCost = $MC->minting_cost;
                        }
                    }
                }
            } else if ($roundedGrammage < $this->GoldMintGram) {
                session()->flash('error');
                session()->flash('title', 'Invalid Quantity!');
                session()->flash('message', 'You cannot exceed more than what you own.');
                $this->GoldMintGram = 0;
            } else
                $this->GoldMintGram = 0;
        } else {
            if ($roundedGrammage >= $this->GoldMintGram) {
                if ($this->GoldMint->prod_qty != $this->GoldMintGram) {

                    if ($this->GoldMintGram > 0) {
                        $this->GoldMint->prod_qty = $this->GoldMintGram;
                        $this->GoldMint->save();
                    } else {
                        $this->GoldMint->delete();
                        $this->MintingCost = 0;
                    }
                }
            } else {
                session()->flash('error');
                session()->flash('title', 'Invalid Quantity!');
                session()->flash('message', 'You cannot exceed more than what you own.');
                $this->GoldMintGram = $this->GoldMint->prod_qty;
            }



            if ($this->GoldMint->deleted_at == NULL) {
                foreach ($MintingCost as $MC) {
                    if ($this->MintingCost == 0) {
                        if ($this->GoldMintGram >= $MC->range) {
                            $this->MintingCost = $MC->minting_cost;
                        }
                    }
                }
            }
        }

        return view('livewire.page.physical-gold.outright-spot-gold')->extends('default.default');
    }
}
