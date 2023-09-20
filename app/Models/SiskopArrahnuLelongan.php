<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiskopArrahnuLelongan extends Model
{
    use HasFactory;

    protected $connection = 'siskopdb';
    protected $table = "siskop.ARRAHNU_LELONGAN";
    protected $guarded = [];
    public $timestamps = false;
}
