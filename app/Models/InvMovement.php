<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvMovement extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo('App\Models\InvCategory', 'category_id', 'id');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\InvItemType', 'item_type_id', 'id');
    }

    public function item()
    {
        return $this->belongsTo('App\Models\InvItem', 'item_id', 'id');
    }

    public function supplier()
    {
        return $this->belongsTo('App\Models\InvSupplier', 'supplier_id', 'id');
    }
}
