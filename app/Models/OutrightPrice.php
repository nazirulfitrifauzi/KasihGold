<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class OutrightPrice extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'outright_price';
    protected $guarded = [];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function item()
    {
        return $this->belongsTo('App\Models\InvItem', 'item_id', 'id');
    }
}
