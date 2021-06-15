<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class States extends Model
{
    use HasFactory;
    protected $table = 'states';

    public function profile()
    {
        return $this->hasMany('App\Models\Profile', 'state_id', 'id');
    }
}
