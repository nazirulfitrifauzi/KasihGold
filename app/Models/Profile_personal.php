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

    public function state()
    {
        return $this->belongsTo('App\Models\States', 'state_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function tempAgent()
    {
        return $this->belongsTo('App\Models\User', 'agent_id', 'id');
    }

    public function getFullAddressAttribute()
    {
        $address = [
            $this->address1,
            $this->address2,
            $this->address3,
            $this->postcode,
            $this->town,
            $this->state->description,
        ];

        $fullAddress = "";

        foreach($address as $item) {
            if($item != '' and !is_null($item)) {
                $fullAddress .= rtrim(trim($item), ',') . ", ";
            }
        }

        if($fullAddress != "") $fullAddress = rtrim(trim($fullAddress), ',');

        return $fullAddress;
    }
}
