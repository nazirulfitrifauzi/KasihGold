<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class PhysicalConvert extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'change_physical';
    protected $guarded = [];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function states()
    {
        return $this->belongsTo('App\Models\States', 'state', 'id');
    }
}
