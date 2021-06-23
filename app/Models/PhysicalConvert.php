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
}
