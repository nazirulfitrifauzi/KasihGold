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

    public function getRules()
    {
        return [
            'bids.*' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/', function ($attribute, $value, $fail) {
                $siriNo = explode('.', $attribute)[1]; // Extract the SIRI_NO from the attribute name
                $amtRezab = ArrahnuAuctionList::where('SIRI_NO', $siriNo)->value('AMT_REZAB');

                if ($value < $amtRezab) {
                    $fail("Bidaan mesti lebih daripada Rezab");
                }
            }]
        ];
    }

    protected $messages = [
        'bids.*.required' => 'Bidaan diperlukan',
        'bids.*.numeric' => 'Hanya nombor dibenarkan.',
        'bids.*.regex' => 'Hanya 2 titik perpuluhan.',
    ];

    public function addSelected($id)
    {
        // Only add the ID if it's not already in the array
        if (!array_key_exists($id, $this->selectedSiri)) {
            $amtRezab = ArrahnuAuctionList::where('SIRI_NO', $id)->value('AMT_REZAB');
            $this->selectedSiri[$id] = $amtRezab;

            // Initialize the bid for this item with a null value
            $this->bids[$id] = null;
        }
    }

    public function submitBidaan()
    {
        $this->validate($this->getRules());

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
