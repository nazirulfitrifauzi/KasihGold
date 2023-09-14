<?php

namespace App\Http\Livewire\Page\Lelongan;

use App\Models\ArrahnuAuctionList;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Lelongan extends Component
{
    use WithPagination;

    public function render()
    {
        $lelong = ArrahnuAuctionList::with(['pawnDetails'])
                        ->where('AUCTION_STATUS', 'BUKA')
                        ->whereRaw('isnull(AMT_REZAB, 0) > 0')
                        ->orderBy('SIRI_NO')
                        ->paginate(5);

        return view('livewire.page.lelongan.lelongan', compact('lelong'))->extends('default.default');
    }
}
