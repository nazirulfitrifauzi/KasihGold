<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArrahnuDailyPrice extends Model
{
    use HasFactory;

    protected $connection = 'arrahnudb';
    protected $table = "ARRAHNU.DAILY_GOLD_PRICE";
    protected $guarded = [];
    public $timestamps = false;

    public function details()
    {
        return $this->belongsTo(ArrahnuRefGoldType::class, 'GOLD_CODE', 'GOLD_CODE');
    }

    /**
     * Fetch today's gold price details.
     *
     * @return array
     */
    public static function fetchTodayGoldPriceDetails()
    {
        $prices = static::where('EFF_DATE', date('Y-m-d'))
                        ->where('GOLD_CODE', 17)  // filter 24k karat
                        ->get();
        $value = [];

        foreach ($prices as $row) {
            $value[$row->GOLD_CODE] = [
                'type' => $row->details->GOLD_TYPE,
                'carat' => $row->details->GOLD_KARAT,
                'price' => $row->PRICE,
            ];
        }

        return $value;
    }
}
