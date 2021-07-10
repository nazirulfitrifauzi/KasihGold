<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvItem extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function type()
    {
        return $this->belongsTo('App\Models\InvItemType', 'item_type_id', 'id');
    }

    // public function supplier()
    // {
    //     return $this->belongsTo('App\Models\InvSupplier', 'supplier_id', 'id');
    // }

    public function master()
    {
        return $this->hasMany('App\Models\InvMaster', 'item_id', 'id');
    }

    public function info()
    {
        return $this->hasOne('App\Models\InvInfo', 'prod_code', 'code');
    }

    public function marketPrice()
    {
        return $this->hasOne('App\Models\MarketPrice', 'item_id', 'id');
    }

    public function commissionKAP()
    {
        return $this->hasOne('App\Models\CommissionRateKap', 'item_id', 'id');
    }

    public function movement()
    {
        return $this->hasMany('App\Models\InvMovement', 'item_id', 'id');
    }

    public function rates()
    {
        return $this->hasOne('App\Models\CommissionRate', 'item_id', 'id');
    }

    public function costDaily()
    {
        return $this->hasOne('App\Models\CostDaily', 'item_id', 'id');
    }

    public function costHistory()
    {
        return $this->hasMany('App\Models\CostHistory', 'item_id', 'id');
    }
}
