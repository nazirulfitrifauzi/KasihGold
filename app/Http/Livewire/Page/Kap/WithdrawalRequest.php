<?php

namespace App\Http\Livewire\Page\Kap;

use App\Models\BuyBack;
use App\Models\GoldbarOwnership;
use App\Models\OutrightSell;
use App\Models\PhysicalConvert;
use Livewire\Component;
use Livewire\WithFileUploads;

class WithdrawalRequest extends Component
{
    use WithFileUploads;

    public $appid, $proofdoc;


    public function outApp($appid)
    {
        $this->validate([
            'proofdoc' => 'required|file|max:4096', // 4MB Max

        ]);

        $outright = OutrightSell::where('id', $appid)->first();

        $outright->status = 1;
        $outright->doc_1 = $this->proofdoc->storeAs('public/exit', $outright->id . '-Outright-ProofOfTransfer.pdf');;
        $outright->save();

        $goldOwnership = GoldbarOwnership::where('ex_id', $outright->id)->get();

        foreach ($goldOwnership as $ownership) {
            $ownership->ex_flag = 1;
            $ownership->save();
        }

        session()->flash('success');
        session()->flash('title', 'Success!');
        session()->flash('message', 'Outright Sell has successfully approved!');
        return redirect('withdrawal-request');
    }

    public function bbApp($appid)
    {
        $this->validate([
            'proofdoc' => 'required|file|max:4096', // 4MB Max

        ]);

        $buyback = BuyBack::where('id', $appid)->first();

        $buyback->status = 1;
        $buyback->doc_1 = $this->proofdoc->storeAs('public/exit', $buyback->id . '-Buyback-ProofOfTransfer.pdf');;
        $buyback->save();

        $goldOwnership = GoldbarOwnership::where('ex_id', $buyback->id)->get();

        foreach ($goldOwnership as $ownership) {
            $ownership->ex_flag = 1;
            $ownership->save();
        }

        session()->flash('success');
        session()->flash('title', 'Success!');
        session()->flash('message', 'Buyback has successfully approved!');
        return redirect('withdrawal-request');
    }

    public function pConvApp($appid)
    {

        $phyConv = PhysicalConvert::where('id', $appid)->first();

        $phyConv->status = 1;
        $phyConv->save();

        $goldOwnership = GoldbarOwnership::where('ex_id', $phyConv->id)->get();

        foreach ($goldOwnership as $ownership) {
            $ownership->ex_flag = 1;
            $ownership->save();
        }

        session()->flash('success');
        session()->flash('title', 'Success!');
        session()->flash('message', 'Physical Conversion has successfully approved and will reach at your doorstep soon!');
        return redirect('withdrawal-request');
    }
    public function render()
    {
        return view('livewire.page.kap.withdrawal-request', [
            'outright' => OutrightSell::where('status', 0)->paginate(5),
            'buybacks' => BuyBack::where('status', 0)->paginate(5),
            'physical' => PhysicalConvert::where('status', 0)->paginate(5),
        ]);
    }
}
