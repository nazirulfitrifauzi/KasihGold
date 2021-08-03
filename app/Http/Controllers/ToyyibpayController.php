<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CommissionDetailKap;
use App\Models\Goldbar;
use App\Models\GoldbarOwnership;
use App\Models\GoldbarOwnershipPending;
use App\Models\InvInfo;
use App\Models\PhysicalConvert;
use App\Models\ToyyibBills;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ToyyibpayController extends Controller
{



    public function paymentStatusConv()
    {
        $response = request()->all(['status_id', 'billcode', 'order_id']);

        if ($response['status_id'] == 1) {
            $gold = PhysicalConvert::where('user_id', auth()->user()->id)
                ->where('ref_payment', $response['billcode'])
                ->where('status', 2)
                ->first();

            if ($gold) {
                $gold->update(['status' => 1]);

                session()->flash('message', 'Your Physical Gold Conversion Request Has Successfully Submitted.');

                session()->flash('success');
                session()->flash('title', 'Success!');
            }
        } elseif ($response['status_id'] == 3) {
            $gold = PhysicalConvert::where('user_id', auth()->user()->id)
                ->where('ref_payment', $response['billcode'])
                ->where('status', 2)
                ->first();

            if ($gold) {
                $gold->update(['status' => 3]);

                session()->flash('message', 'Your Physical Gold Conversion Request is Unsuccessful.');

                session()->flash('error');
                session()->flash('title', 'Error!');
            }
        }


        return redirect('home');
        // return $response;
    }


    public function paymentStatusBuy()
    {
        $response = request()->all(['status_id', 'billcode', 'order_id']);
        $toyyibBill = ToyyibBills::where('bill_code', $response['billcode'])
            ->first();

        if ($response['status_id'] == 1 && $toyyibBill->status != 1) {

            $gold = GoldbarOwnershipPending::where('referenceNumber', $response['billcode'])
                ->where('status', 2)
                ->get();


            $toyyibBill->status = 1;
            $toyyibBill->save();

            foreach ($gold as $golds) {
                //Change the gold pending to successful payment
                $golds->update(['status' => 1]);

                GoldbarOwnership::create([
                    'gold_id'           => $golds->gold_id,
                    'user_id'           => auth()->user()->id,
                    'ouid'              => (string) Str::uuid(),
                    'weight'            => $golds->weight,
                    'bought_price'      => $golds->bought_price,
                    'active_ownership'  => 1,
                    'referenceNumber'   => $response['billcode'],
                    'created_by'        => auth()->user()->id,
                    'updated_by'        => auth()->user()->id,
                    'created_at'        => now(),
                    'updated_at'        => now(),
                ]);

                //Remove weight on hold and replaces it with weight occupied


                $currentGoldbar = Goldbar::where('id', $golds->gold_id)->first();

                $currentGoldbar->weight_on_hold -= $golds->weight;
                $currentGoldbar->weight_occupied += $golds->weight;
                $currentGoldbar->save();

                $gold_info = InvInfo::where('prod_weight', $golds->weight)
                    ->where('user_id', 10)
                    ->first();

                // distribute commission/cashback to the upline user
                if (auth()->user()->isUserKAP()) {
                    $commission = $gold_info->item->commissionKAP->agent_rate;
                    $upline_id = auth()->user()->upline->user->id;

                    CommissionDetailKap::create([
                        'user_id'           => $upline_id,
                        'item_id'           => $gold_info->item->id,
                        'bought_id'         => auth()->user()->id,
                        'commission'        => $commission,
                        'created_by'        => auth()->user()->id,
                        'updated_by'        => auth()->user()->id,
                        'created_at'        => now(),
                        'updated_at'        => now(),
                    ]);
                }
            }

            session()->flash('message', 'Your Digital Gold Purchase is Successful.');

            session()->flash('success');
            session()->flash('title', 'Success!');
        } elseif ($response['status_id'] == 3 && $toyyibBill->status != 3) {
            $gold = GoldbarOwnershipPending::where('referenceNumber', $response['billcode'])
                ->where('status', 2)
                ->get();

            $toyyibBill->status = 3;
            $toyyibBill->save();

            foreach ($gold as $golds) {
                //Nullifies the gold pending because of failed payment
                $golds->update(['status' => 3]);

                //Remove weight on hold and replaces it with weight occupied
                $currentGoldbar = Goldbar::where('id', $golds->gold_id)->first();

                $currentGoldbar->weight_on_hold -= $golds->weight;
                $currentGoldbar->weight_vacant += $golds->weight;
                $currentGoldbar->save();
            }

            session()->flash('message', 'Your Digital Gold Purchase is Unsuccessful.');

            session()->flash('error');
            session()->flash('title', 'Error!');
        }

        return redirect('home');
        // return $response;
    }

    public function callback()
    {
        $response = request()->all(['refno', 'status', 'reason', 'billcode', 'order_id', 'amount']);
        Log::info($response);
    }
}
