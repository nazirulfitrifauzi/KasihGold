<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArrahnuRefGoldType extends Model
{
    use HasFactory;

    protected $connection = 'arrahnudb';
    protected $table = "ARRAHNU.REF_GOLD_TYPE";
    protected $primaryKey = "GOLD_CODE";

    protected $guarded = [];

    public $timestamps = false;

    public function todayPrice()
    {
        return optional(ArrahnuDailyPrice::where('GOLD_CODE', $this->GOLD_CODE)->where('EFF_DATE', date('Y-m-d'))->first())->PRICE;
    }
}
