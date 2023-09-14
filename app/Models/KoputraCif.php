<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KoputraCif extends Model
{
    use HasFactory;
    protected $connection = 'koputradb';
    protected $table = "CIF.CUSTOMERS";

    protected $guarded = [];

    public $timestamps = false;
}
