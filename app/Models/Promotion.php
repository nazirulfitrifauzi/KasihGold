<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'type' ,
        'name',
        'start_date',
        'end_date',
        'description'
    ];

    public function types()
    {
        return $this->hasOne(RefPromoType::class, 'id', 'type');
    }
}
