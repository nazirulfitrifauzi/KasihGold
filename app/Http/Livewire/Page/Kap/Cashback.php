<?php

namespace App\Http\Livewire\Page\Kap;

use App\Models\CommissionDetailKap;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class Cashback extends Component
{
    use WithFileUploads;

    public $photo;
    public $report_date;
    public $date;

    public function saveProof($id)
    {
        $this->validate([
            'photo' => 'image|max:5024', // 5MB Max
        ]);

        $this->date = Carbon::createFromFormat('Y-m-d', $this->report_date . '-01');
        $photo_name = $this->date->format('F Y') . '.' . $this->photo->extension();

        $this->photo->storeAs('public/cashback/' . $id , $photo_name);

        CommissionDetailKap::where('user_id', $id)
                            ->whereDate('created_at', '>=', $this->date->startOfMonth()->toDateString())
                            ->whereDate('created_at', '<=', $this->date->endOfMonth()->toDateString())
                            ->whereStatus(0)
                            ->update([
                                'status'        => 1,
                                'path'          => 'cashback/' . $id . '/' . $photo_name,
                                'updated_by'    => $id,
                                'updated_at'    => now(),
                            ]);

        $this->photo = "";
        $this->dispatchBrowserEvent('close-modal'); // close modal when done

        session()->flash('success');
        session()->flash('title', 'Success!');
        session()->flash('message', 'Cashback Proof has been updated.');
    }

    public function render()
    {
        $this->report_date == null
            ? $this->report_date = now()->format('Y-m')
            : $this->report_date;

        $this->date = Carbon::createFromFormat('Y-m-d', $this->report_date . '-01');


        return view('livewire.page.kap.cashback', [
            'lists' => CommissionDetailKap::select("user_id", DB::raw("SUM(commission) as total"))
                                            ->whereDate('created_at', '>=', $this->date->startOfMonth()->toDateString())
                                            ->whereDate('created_at', '<=', $this->date->endOfMonth()->toDateString())
                                            ->whereStatus(0)
                                            ->groupBy("user_id")
                                            ->get(),
        ]);
    }
}
