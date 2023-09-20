<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArrahnuPayType extends Model
{
    use HasFactory;

    protected $connection = 'arrahnudb';
    protected $table = "ARRAHNU.REF_PAY_TYPE";
    protected $guarded = [];
    public $timestamps = false;
}