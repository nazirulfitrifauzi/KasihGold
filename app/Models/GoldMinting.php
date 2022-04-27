<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class GoldMinting extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'spot_gold_exit';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function toyyib()
    {
        return $this->belongsTo('App\Models\ToyyibBills', 'bill_code', 'bill_code');
    }
}
