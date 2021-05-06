<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvCart extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'inv_cart';
    protected $guarded = [];
}
