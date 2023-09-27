<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArrahnuRefStartEndDay extends Model
{
    use HasFactory;
    protected $connection = 'arrahnudb';
    protected $table = "SYSTM.RECORD_START_END_DAY";

    protected $guarded = [];
}
