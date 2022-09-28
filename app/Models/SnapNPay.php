<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SnapNPay extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    protected $table = 'snapNPay';

    public function golds()
    {
        return $this->hasMany('App\Models\GoldbarOwnershipPending', 'referenceNumber', 'bill_code');
    }
}
