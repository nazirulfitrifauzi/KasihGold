<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvCart extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'inv_cart';
    protected $guarded = [];

    public function products()
    {
        return $this->belongsTo('App\Models\InvInfo', 'item_id', 'item_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function item()
    {
        return $this->belongsTo('App\Models\InvItem', 'item_id', 'id');
    }
    public function commission()
    {
        return $this->belongsTo('App\Models\CommissionRateKap', 'item_id', 'item_id');
    }
}
