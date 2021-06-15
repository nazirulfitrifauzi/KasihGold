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
        return $this->belongsTo('App\Models\User', 'id', 'user_id');
    }

    public function goldbar()
    {
        return $this->belongsTo('App\Models\Goldbar', 'gold_id', 'gold_id');
    }
}
