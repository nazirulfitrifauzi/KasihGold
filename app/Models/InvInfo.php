<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvInfo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'inv_info';
    protected $guarded = [];

    public function item()
    {
        return $this->belongsTo('App\Models\InvItem', 'prod_code', 'code');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
