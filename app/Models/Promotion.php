<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'type' ,
        'name',
        'start_date',
        'end_date',
        'description',
        'item_id',
        'promo_price',
        'promo_code'
    ];

    public function types()
    {
        return $this->hasOne(RefPromoType::class, 'id', 'type');
    }

    public function items()
    {
        return $this->belongsTo(InvItem::class, 'item_id', 'id');
    }
}
