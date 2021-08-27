<?php

namespace App\Http\Livewire\Page\DigitalGold;

use App\Models\BuyBack;
use App\Models\OutrightSell;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ExitRequest extends Component
{
    use WithPagination;




    public function render()
    {
        $outright = OutrightSell::query()
            ->select('status', 'surrendered_amount', 'created_at')
            ->where('user_id', auth()->user()->id)
            ->addSelect(DB::raw("'Outright' as xit"));

        $exit = BuyBack::query()
            ->select('status', 'surrendered_amount', 'created_at')
            ->where('user_id', auth()->user()->id)
            ->addSelect(DB::raw("'Buyback' as xit"))
            ->union($outright)
            ->paginate(3);


        // $exit = $outright->union($buyback);

        // $exit = $exit->paginate(3);


        return view('livewire.page.digital-gold.exit-request', [
            'exit' => $exit,
        ]);
    }
}
