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

    public function item()
    {
        return $this->belongsTo('App\Models\InvItem', 'item_id', 'id');
    }
}
