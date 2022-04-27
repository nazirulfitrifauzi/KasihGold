<?php

namespace App\Http\Livewire\Page\PhysicalGold;

use Livewire\Component;
use App\Models\InvCart;
use App\Models\InvInfo;
use Illuminate\Support\Facades\DB;
use App\Models\GoldbarOwnership;


class GoldMinting extends Component
{

    public $GoldMintQTY, $GoldMint, $total, $MintingCost;

    public function mount()
    {

        $totalGoldbar = GoldbarOwnership::where('user_id', auth()->user()->id)->where('active_ownership', 1)->where('spot_gold', 1)->get();

        foreach ($totalGoldbar as $tGold) {
            $this->total += $tGold->available_weight;
        }

        $this->GoldMint = InvCart::where('user_id', auth()->user()->id)->where('exit_type', 3)->first();

        if (!$this->GoldMint) {
            $this->GoldMintQTY = 0;
        } else {
            $this->GoldMintQTY = $this->GoldMint->prod_qty;
        }
    }

    public function next()
    {
        if ($this->GoldMintQTY >= 1) {
            return redirect('gm-checkout');
        } else
            $this->emit('message', 'The total weight must be 1 gram and above!');
    }

    public function render()
    {

        $roundedGrammage = (int)$this->total;
        $this->MintingCost = 0;

        $this->GoldMint = InvCart::where('user_id', auth()->user()->id)->where('exit_type', 3)->first();



        if (!$this->GoldMint) {

            if ($this->GoldMintQTY != 0 && ($roundedGrammage >= $this->GoldMintQTY)) {
                InvCart::create(
                    [
                        'user_id'       => auth()->user()->id,
                        'item_id'       => 9,
                        'prod_qty'      => $this->GoldMintQTY,
                        'exit_type'     => 3,
                        'created_by'    => auth()->user()->id,
                        'updated_by'    => auth()->user()->id,
                        'created_at'    => now(),
                        'updated_at'    => now(),
                    ]
                );

                if ($this->GoldMintQTY >= 1000)
                    $this->MintingCost = 50;
                else if ($this->GoldMintQTY >= 250)
                    $this->MintingCost = 70;
                else if ($this->GoldMintQTY >= 100)
                    $this->MintingCost = 80;
                else if ($this->GoldMintQTY >= 50)
                    $this->MintingCost = 90;
                else if ($this->GoldMintQTY >= 20)
                    $this->MintingCost = 100;
                else if ($this->GoldMintQTY >= 10)
                    $this->MintingCost = 160;
                else if ($this->GoldMintQTY >= 5)
                    $this->MintingCost = 185;
                else if ($this->GoldMintQTY >= 1)
                    $this->MintingCost = 70;
            } else if ($roundedGrammage < $this->GoldMintQTY) {
                session()->flash('error');
                session()->flash('title', 'Invalid Quantity!');
                session()->flash('message', 'You cannot exceed more than what you own.');
                $this->GoldMintQTY = 0;
            } else
                $this->GoldMintQTY = 0;
        } else {
            if ($roundedGrammage >= $this->GoldMintQTY) {
                if ($this->GoldMint->prod_qty != $this->GoldMintQTY) {

                    if ($this->GoldMintQTY > 0) {
                        $this->GoldMint->prod_qty = $this->GoldMintQTY;
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
                $this->GoldMintQTY = $this->GoldMint->prod_qty;
            }

            if ($this->GoldMint->deleted_at == NULL) {
                if ($this->GoldMint->prod_qty >= 1000)
                    $this->MintingCost = 50;
                else if ($this->GoldMint->prod_qty >= 250)
                    $this->MintingCost = 70;
                else if ($this->GoldMint->prod_qty >= 100)
                    $this->MintingCost = 80;
                else if ($this->GoldMint->prod_qty >= 50)
                    $this->MintingCost = 90;
                else if ($this->GoldMint->prod_qty >= 20)
                    $this->MintingCost = 100;
                else if ($this->GoldMint->prod_qty >= 10)
                    $this->MintingCost = 160;
                else if ($this->GoldMint->prod_qty >= 5)
                    $this->MintingCost = 185;
                else if ($this->GoldMint->prod_qty >= 1)
                    $this->MintingCost = 70;
                else
                    $this->MintingCost = 0;
            }
        }








        return view('livewire.page.physical-gold.gold-minting')->extends('default.default');
    }
}
