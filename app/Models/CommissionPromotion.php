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
}
