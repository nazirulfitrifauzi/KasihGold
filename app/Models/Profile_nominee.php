<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile_nominee extends Model
{
    use HasFactory;

    protected $table = 'profile_nominee';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function memberRelationship()
    {
        return $this->belongsTo('App\Models\MemberRelationship', 'member_relationship_id', 'id');
    }
}
