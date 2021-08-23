<?php

use App\Models\Goldbar;
use App\Models\GoldbarOwnership;
use App\Models\GoldbarOwnershipPending;
use App\Models\ToyyibBills;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;


/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');




Artisan::command('UpdatePayment', function () {

    $pendingPayment = ToyyibBills::where('status', 2)
        ->get();

    foreach ($pendingPayment as $pendingTrx) {

        $option = array(
            'billCode' => $pendingTrx->bill_code
        );

        $url = 'https://dev.toyyibpay.com/index.php/api/getBillTransactions';
        $response = Http::asForm()->post($url, $option);

        if ($response[0]['billpaymentStatus'] == 1) {
            $pendingTrx->update(['status' => 1]);

            $pendingGold = GoldbarOwnershipPending::where('referenceNumber', $pendingTrx->bill_code)->get();

            foreach ($pendingGold as $pendingG) {
                $pendingG->update(['status' => 1]);

                GoldbarOwnership::create([
                    'gold_id'           => $pendingG->gold_id,
                    'user_id'           => $pendingG->user_id,
                    'ouid'              => (string) Str::uuid(),
                    'weight'            => $pendingG->weight,
                    'bought_price'      => $pendingG->bought_price,
                    'active_ownership'  => 1,
                    'referenceNumber'   => $pendingG->referenceNumber,
                    'created_by'        => 0, //id 0 meaning that it has been updated by the scheduler
                    'updated_by'        => 0,
                    'created_at'        => now(),
                    'updated_at'        => now(),
                ]);

                $currentGoldbar = Goldbar::where('id', $pendingG->gold_id)->first();
                $currentGoldbar->weight_on_hold -= $pendingG->weight;
                $currentGoldbar->weight_occupied += $pendingG->weight;
                $currentGoldbar->save();
            }
        } elseif (($response[0]['billpaymentStatus'] == 4) && ($pendingTrx->updated_at <= now()->subMinutes(2))) {
            $pendingTrx->update(['status' => 3]);

            $pendingGold = GoldbarOwnershipPending::where('referenceNumber', $pendingTrx->bill_code)->get();

            foreach ($pendingGold as $pendingG) {
                $pendingG->update(['status' => 3]);

                $currentGoldbar = Goldbar::where('id', $pendingG->gold_id)->first();
                $currentGoldbar->weight_on_hold -= $pendingG->weight;
                $currentGoldbar->weight_vacant += $pendingG->weight;
                $currentGoldbar->save();
            }
        }
    }
})->purpose('Update successful payment if the user close without follow the normal flow of purchase and release gold on hold if transaction is more than 30 minutes.');
