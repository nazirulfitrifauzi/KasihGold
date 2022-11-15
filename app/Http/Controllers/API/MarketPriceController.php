<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\InvInfo;
use App\Models\OutrightPrice;
use App\Models\SpotGoldPricing;
use Illuminate\Http\Request;

class MarketPriceController extends Controller
{
    public function index()
    {
        $digitalPrice = InvInfo::where('prod_cat', 1)->get();
        $digital1gOutPrice = OutrightPrice::select('price')->where('item_id', 9)->first();
        $dinarPrice = InvInfo::where('prod_cat', 2)->first();
        $spotPrice = InvInfo::where('prod_cat', 3)->first();
        $spotPriceB = SpotGoldPricing::select('percentage')->where('range', '1g')->first();

        $digitalGoldBuy = [];
        $digitalGoldSell = [];

        foreach($digitalPrice as $item){
            $digitalGoldBuy[] = array(number_format($item->prod_weight, 2), $item->marketPrice->price);
            $digitalGoldSell[] = array(number_format($item->prod_weight, 2), ($item->prod_weight < 1) ? $digital1gOutPrice->price . " (1g)" : $item->outrightPrice->price);
        }

        return $this->successResponse("Data fetch successfully.", [
            'spot_gold_buy' => round($spotPrice->marketPrice->price * (($spotPriceB->percentage + 100) / 100), 2),
            'spot_gold_sell' => $spotPrice->marketPrice->price,
            'dinar_buy' => $dinarPrice->marketPrice->price,
            'dinar_sell' => $dinarPrice->outrightPrice->price,
            'digital_gold_buy' => $digitalGoldBuy,
            'digital_gold_sell' => $digitalGoldSell,
        ], 201);
    }
}
