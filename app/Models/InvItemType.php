<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvItemType extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo('App\Models\InvCategory', 'category_id', 'id');
    }

    public function item()
    {
        return $this->hasMany('App\Models\InvItem', 'item_type_id', 'id');
    }
}
