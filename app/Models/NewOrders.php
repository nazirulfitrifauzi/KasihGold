<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class NewOrders extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $table = 'new_orders';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function master()
    {
        return $this->hasMany('App\Models\InvMaster', 'item_id', 'item_id');
    }
}
