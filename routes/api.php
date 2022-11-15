<?php

use App\Http\Controllers\API\MarketPriceController;
use App\Models\MarketPrice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('market-price', [MarketPriceController::class, 'index']);

// Route::get('/market-price', function () {
//     $marketPrice = DB::table('market_prices')
//                         ->join('inv_items', 'inv_items.id', '=', 'market_prices.item_id')
//                         ->select('inv_items.name', 'market_prices.price', 'market_prices.updated_at')
//                         ->get();

//     return $marketPrice;
// });