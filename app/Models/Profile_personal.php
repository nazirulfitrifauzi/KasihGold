<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile_personal extends Model
{
    use HasFactory;

    protected $table = 'profile_personal';
    protected $guarded = [];

    public function gender()
    {
        return $this->hasOne('App\Models\Genders', 'id', 'gender_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
