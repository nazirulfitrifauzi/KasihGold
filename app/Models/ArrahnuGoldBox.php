<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArrahnuGoldBox extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $connection = 'arrahnudb';
    protected $table = "ARRAHNU.REF_GOLD_BOX";
    protected $primaryKey = 'BOX_CODE';

    protected $guarded = [];

    public $timestamps = false;
}
