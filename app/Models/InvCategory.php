<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvCategory extends Model
{
    use HasFactory;

    public function item_type()
    {
        return $this->hasMany('App\Models\InvItemType', 'category_id', 'id');
    }
}
