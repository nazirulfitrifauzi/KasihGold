<?php

namespace App\Http\Livewire\Page\Lelongan;

use App\Models\ArrahnuAuctionList;
use Livewire\Component;
use Livewire\WithPagination;

class Lelongan extends Component
{
    use WithPagination;

    public $selectedSiri = [];
    public $bids = [];

    public function addSelected($id)
    {
        // Only add the ID if it's not already in the array
        if (!array_key_exists($id, $this->selectedSiri)) {
            $amtRezab = ArrahnuAuctionList::where('SIRI_NO', $id)->value('AMT_REZAB');
            $this->selectedSiri[$id] = $amtRezab;
        }
    }

    public function submitBidaan()
    {
        $this->validate([
            'bids.*' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/'
        ]);

        dd($this->bids);
    }

    public function render()
    {
        $lelong = ArrahnuAuctionList::with(['pawnDetails'])
                        ->where('AUCTION_STATUS', 'BUKA')
                        ->whereRaw('isnull(AMT_REZAB, 0) > 0')
                        ->orderBy('SIRI_NO')
                        ->paginate(15);

        return view('livewire.page.lelongan.lelongan', compact('lelong'))->extends('default.default');
    }
}
