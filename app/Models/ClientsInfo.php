<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientsInfo extends Model
{
    use HasFactory;

    protected $table = 'clients_info';
    protected $guarded = [];

    public function user()
    {
        return $this->hasMany('App\Models\User', 'client', 'id');
    }
}
