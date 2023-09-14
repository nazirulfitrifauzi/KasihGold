<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArrahnuPawnDetails extends Model
{
    use HasFactory;

    protected $connection = 'arrahnudb';
    protected $table = "ARRAHNU.PAWN_DETAILS";

    protected $guarded = [];

    public $timestamps = false;

    public function gadaian()
    {
        return  $this->belongsTo('App\Models\PawnMaster', 'SIRI_NO', 'SIRI_NO');
    }

    public function maklumat()
    {
        return $this->belongsTo(Ref_MarhunType::class, 'MARHUN_CODE', 'MARHUN_CODE');
    }

    public function emas()
    {
        return $this->belongsTo(Ref_GoldType::class, 'KARAT', 'GOLD_KARAT');
    }

    public function getGoldPriceByDate($date)
    {
        return DailyGoldPrice::where('EFF_DATE', $date)->where('GOLD_CODE', $this->emas->GOLD_CODE)->first()->PRICE;
    }
}
