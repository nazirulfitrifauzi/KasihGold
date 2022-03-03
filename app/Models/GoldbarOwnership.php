<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GoldbarOwnership extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'gold_ownership';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function goldbar()
    {
        return $this->belongsTo('App\Models\Goldbar', 'gold_id', 'id');
    }

    public function products()
    {
        return $this->belongsTo('App\Models\InvInfo', 'item_id', 'item_id');
    }

    public function cart()
    {
        return $this->belongsTo('App\Models\InvCart', 'item_id', 'item_id');
    }
}
