<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvMaster extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function item()
    {
        return $this->belongsTo('App\Models\InvItem', 'item_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function history()
    {
        return $this->hasMany('App\Models\InvMasterHistory', 'serial_no', 'serial_no');
    }
}
