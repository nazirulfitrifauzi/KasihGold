<?php

namespace App\Http\Livewire\Page\Kap;

use App\Models\CommissionDetailKap;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Cashback extends Component
{
    public function render()
    {
        return view('livewire.page.kap.cashback', [
            'lists' => CommissionDetailKap::select("user_id", DB::raw("SUM(commission) as total"))
                                            ->groupBy("user_id")
                                            ->get(),
        ]);
    }
}
