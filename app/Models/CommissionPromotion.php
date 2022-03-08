<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommissionPromotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product',
        'promo_code',
        'billCode',
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function toyyibBills()
    {
        return $this->belongsTo('App\Models\ToyyibBills', 'billCode', 'bill_code');
    }
}
