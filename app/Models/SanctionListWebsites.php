<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanctionListWebsites extends Model
{
    use HasFactory;

    protected $table = "sanction_list_websites";
    protected $guarded = [];

    public function screening()
    {
        return $this->hasMany('App\Models\Screening', 'sanction_id', 'id');
    }
}
