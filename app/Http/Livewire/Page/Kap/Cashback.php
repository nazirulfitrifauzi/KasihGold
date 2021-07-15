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

        $date = now()->endOfMonth()->subDay('3'); // cashback only count to (-3 days from end month)
        $photo_name = now()->format('F Y') . '.' . $this->photo->extension();
        $this->photo->storeAs('public/cashback/' . $id , $photo_name);

        CommissionDetailKap::where('user_id', $id)
                            ->whereDate('created_at', '<=', $date->toDateString())
                            ->whereStatus(0)
                            ->update([
                                'status' => 1,
                                'path' => 'cashback/' . $id . '/' . $photo_name,
                            ]);

        $this->dispatchBrowserEvent('close-modal'); // close modal if success

        session()->flash('success');
        session()->flash('title', 'Success!');
        session()->flash('message', 'Cashback Proof has been updated.');
    }

    public function render()
    {
        $date = now()->endOfMonth()->subDay('3'); // cashback only count to (-3 days from end month)

        return view('livewire.page.kap.cashback',[
            'from' => now()->subMonthsNoOverflow()->endOfMonth()->subDay('3'),
            'date' => $date,
            'lists' => CommissionDetailKap::select("user_id", DB::raw("SUM(commission) as total"))
                                            ->whereDate('created_at', '<=', $date->toDateString())
                                            ->whereStatus(0)
                                            ->groupBy("user_id")
                                            ->get(),
        ]);
    }
}
