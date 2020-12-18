<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Screening extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function sanction()
    {
        return $this->belongsTo('App\Models\SanctionListWebsites', 'sanction_id', 'id');
    }
}
