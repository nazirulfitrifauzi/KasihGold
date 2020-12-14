<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanctionListWebsites extends Model
{
    use HasFactory;

    protected $table = "sanction_list_websites";
    protected $guarded = [];
}
