<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvMovement extends Model
{
    use HasFactory;

    public function item()
    {
        return $this->belongsTo('App\Models\InvItem', 'item_id', 'id');
    }
}
