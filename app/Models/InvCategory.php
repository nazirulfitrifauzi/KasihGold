<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function item_type()
    {
        return $this->hasMany('App\Models\InvItemType', 'category_id', 'id');
    }
}
