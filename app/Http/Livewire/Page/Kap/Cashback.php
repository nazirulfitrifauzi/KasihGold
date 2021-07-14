<?php

namespace App\Http\Livewire\Page\Kap;

use App\Models\CommissionDetailKap;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class Cashback extends Component
{
    use WithFileUploads;

    public $photo;

    public function saveProof($id)
    {
        $this->validate([
            'photo' => 'image|max:5024', // 5MB Max
        ]);

        $this->photo->storeAs('public/cashback/' . $id , 'cashback_payment_' . now()->format('Y-m-d') . '.' . $this->photo->extension());
        // dd($id);
        // $this->photo->store('photos');
    }

    public function render()
    {
        $date = now()->endOfMonth()->subDay('3'); // cashback only count to (-3 days from end month)

        return view('livewire.page.kap.cashback',[
            'from' => now()->subMonthsNoOverflow()->endOfMonth()->subDay('3'),
            'date' => $date,
            'lists' => CommissionDetailKap::select("user_id", DB::raw("SUM(commission) as total"))
                                            ->whereDate('created_at', '<=', $date->toDateString())
                                            ->groupBy("user_id")
                                            ->get(),
        ]);
    }
}
