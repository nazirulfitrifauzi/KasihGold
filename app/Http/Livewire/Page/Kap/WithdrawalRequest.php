<?php

namespace App\Http\Livewire\Page\Kap;

use App\Mail\PhysicalDetails\PhysicalGoldExchange;
use App\Models\BuyBack;
use App\Models\Goldbar;
use App\Models\GoldbarOwnership;
use App\Models\OutrightSell;
use App\Models\PhysicalConvert;
use App\Models\ToyyibBills;
use Illuminate\Support\Facades\Mail;
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
        $outright->doc_1 = $this->proofdoc->storeAs('public/exit', $outright->id . '-Outright-ProofOfTransfer.jpg');;
        $outright->save();

        $goldOwnership = GoldbarOwnership::where('ex_id', $outright->id)->where('user_id', $outright->user_id)->get();

        foreach ($goldOwnership as $ownership) {

            $goldBar = Goldbar::where('id', $ownership->gold_id)->first();
            $goldBar->weight_occupied -= $ownership->weight;
            $goldBar->weight_vacant += $ownership->weight;
            $goldBar->save();

            $ownership->ex_flag = 1;
            $ownership->save();
        }

        session()->flash('success');
        session()->flash('title', 'Success!');
        session()->flash('message', 'Outright Sell has successfully approved!');

        return redirect('withdrawal-request');
    }

    public function outDec($appid)
    {

        $outright = OutrightSell::where('id', $appid)->first();

        $outright->status = 2;
        $outright->save();

        $goldOwnership = GoldbarOwnership::where('ex_id', $outright->id)->where('user_id', $outright->user_id)->get();

        foreach ($goldOwnership as $ownership) {
            $ownership->ex_flag = 2;
            $ownership->active_ownership = 1;
            $ownership->save();
        }


        session()->flash('warning');
        session()->flash('title', 'Declined!');
        session()->flash('message', 'Outright Sell has been declined and the gold is returned back to their inventory!');
        return redirect('withdrawal-request');
    }

    public function bbApp($appid)
    {
        $this->validate([
            'proofdoc' => 'required|file|max:4096', // 4MB Max

        ]);

        $buyback = BuyBack::where('id', $appid)->first();

        $buyback->status = 1;
        $buyback->doc_1 = $this->proofdoc->storeAs('public/exit', $buyback->id . '-Buyback-ProofOfTransfer.jpg');
        $buyback->save();

        $goldOwnership = GoldbarOwnership::where('ex_id', $buyback->id)->where('user_id', $buyback->user_id)->get();

        foreach ($goldOwnership as $ownership) {

            $goldBar = Goldbar::where('id', $ownership->gold_id)->first();
            $goldBar->weight_occupied -= $ownership->weight;
            $goldBar->weight_vacant += $ownership->weight;
            $goldBar->save();

            $ownership->ex_flag = 1;
            $ownership->save();
        }

        session()->flash('success');
        session()->flash('title', 'Success!');
        session()->flash('message', 'Buyback has successfully approved!');
        return redirect('withdrawal-request');
    }

    public function bbDec($appid)
    {


        $buyback = BuyBack::where('id', $appid)->first();

        $buyback->status = 2;
        $buyback->save();

        $goldOwnership = GoldbarOwnership::where('ex_id', $buyback->id)->where('user_id', $buyback->user_id)->get();

        foreach ($goldOwnership as $ownership) {
            $ownership->ex_flag = 2;
            $ownership->active_ownership = 1;
            $ownership->save();
        }

        session()->flash('warning');
        session()->flash('title', 'Declined!');
        session()->flash('message', 'Buyback has been declined and the gold is returned back to their inventory!');
        return redirect('withdrawal-request');
    }

    public function pConvApp($appid)
    {

        $phyConv = PhysicalConvert::where('id', $appid)->first();
        $toyyibBill = ToyyibBills::where('bill_code', $phyConv->ref_payment)->first();
        $phyConv->status = 1;
        $phyConv->save();


        $goldOwnership = GoldbarOwnership::where('ex_id', $phyConv->id)->where('user_id', $phyConv->user_id)->get();

        foreach ($goldOwnership as $ownership) {

            $goldBar = Goldbar::where('id', $ownership->gold_id)->first();
            $goldBar->weight_occupied -= $ownership->weight;
            $goldBar->weight_vacant += $ownership->weight;
            $goldBar->save();

            $ownership->ex_flag = 1;
            $ownership->save();
        }

        session()->flash('success');
        session()->flash('title', 'Success!');
        session()->flash('message', 'Physical Conversion has successfully approved and will reach at their doorstep soon!');

        Mail::to("hadikasihgold@gmail.com")->send(new PhysicalGoldExchange($phyConv, $toyyibBill));


        return redirect('withdrawal-request');
    }

    public function pConvDec($appid)
    {

        $phyConv = PhysicalConvert::where('id', $appid)->first();
        $toyyibBill = ToyyibBills::where('bill_code', $phyConv->ref_payment)->first();

        $phyConv->status = 2;
        $phyConv->save();


        $goldOwnership = GoldbarOwnership::where('ex_id', $phyConv->id)->where('user_id', $phyConv->user_id)->get();

        foreach ($goldOwnership as $ownership) {
            $ownership->ex_flag = 2;
            $ownership->active_ownership = 1;
            $ownership->save();
        }

        session()->flash('warning');
        session()->flash('title', 'Declined!');
        session()->flash('message', 'Physical Conversion has been declined and the gold is returned back to their inventory!');

        // Mail::to("mehmediskandar7@gmail.com")->send(new PhysicalGoldExchange($phyConv, $toyyibBill));


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
