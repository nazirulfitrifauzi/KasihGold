<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class GoldMintingRecords extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'spot_gold_exit_records';
    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function toyyib()
    {
        return $this->belongsTo('App\Models\ToyyibBills', 'bill_code', 'bill_code');
    }

    public function exit()
    {
        return $this->belongsTo('App\Models\GoldMinting', 'exit_id', 'id');
    }
}
