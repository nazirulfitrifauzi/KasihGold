<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvSupplier extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function master()
    {
        return $this->hasMany('App\Models\InvMaster', 'supplier_id', 'id');
    }
}
