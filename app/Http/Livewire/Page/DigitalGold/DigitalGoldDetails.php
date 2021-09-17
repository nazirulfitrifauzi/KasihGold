<?php

namespace App\Http\Livewire\Page\DigitalGold;

use App\Models\GoldbarOwnership;
use Livewire\Component;
use Livewire\WithPagination;

class DigitalGoldDetails extends Component
{
    use WithPagination;

    public  $total, $tPrice, $totalCnt;

    public function mount()
    {
        $goldInfo = GoldbarOwnership::where('user_id', auth()->user()->id)->where('active_ownership', 1)->get();
        foreach ($goldInfo as $golds) {
            $this->total += $golds->weight;
            $this->tPrice += $golds->bought_price;
            $this->totalCnt += 1;
        }
    }


    public function render()
    {
        return view('livewire.page.digital-gold.digital-gold-details', [
            'details' => GoldbarOwnership::where('user_id', auth()->user()->id)->where('active_ownership', 1)
                ->orderBy('created_at', 'desc')
                ->paginate(5),
        ]);
    }
}
