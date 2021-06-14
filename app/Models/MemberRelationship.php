<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberRelationship extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function nomineeProfile()
    {
        return $this->hasMany('App\Models\Profile_nominee', 'member_relationship_id', 'id');
    }
}
