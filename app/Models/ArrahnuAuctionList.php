<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArrahnuAuctionList extends Model
{
    use HasFactory;

    protected $connection = 'arrahnudb';
    protected $table = "ARRAHNU.AUCTION_LIST";
    protected $guarded = [];
    public $timestamps = false;

    public function pawnDetails()
    {
        return $this->hasMany(ArrahnuPawnDetails::class, 'SIRI_NO', 'SIRI_NO');
    }
}
