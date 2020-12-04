<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvItem extends Model
{
    use HasFactory;

    public function type()
    {
        return $this->belongsTo('App\Models\InvItemType', 'item_type_id', 'id');
    }

    public function supplier()
    {
        return $this->belongsTo('App\Models\InvSupplier', 'supplier_id', 'id');
    }

    public function master()
    {
        return $this->hasMany('App\Models\InvMaster', 'item_id', 'id');
    }

    public function movement()
    {
        return $this->hasMany('App\Models\InvMovement', 'item_id', 'id');
    }
}
