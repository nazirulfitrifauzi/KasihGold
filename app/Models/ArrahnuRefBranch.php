<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArrahnuRefBranch extends Model
{
    use HasFactory;
    protected $connection = 'arrahnudb';
    protected $table = "ARRAHNU.REF_BRANCH";

    protected $guarded = [];
}
