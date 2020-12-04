<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvItemType extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo('App\Models\InvCategory', 'category_id', 'id');
    }

    public function item()
    {
        return $this->hasMany('App\Models\InvItem', 'item_type_id', 'id');
    }
}
