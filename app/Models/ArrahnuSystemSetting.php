<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArrahnuSystemSetting extends Model
{
    use HasFactory;

    protected $connection = 'arrahnudb';
    protected $table = "SYSTM.SETTINGS";
    protected $guarded = [];
    public $timestamps = false;
}
