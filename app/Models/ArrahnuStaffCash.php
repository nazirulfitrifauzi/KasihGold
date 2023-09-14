<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArrahnuStaffCash extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $connection = 'arrahnudb';
    protected $table = "ARRAHNU.STAFF_CASH_BALANCE";
    protected $primaryKey = 'ID';
    protected $dates = ['BIZ_DATE'];

    public $timestamps = false;

    public function teller()
    {
        return $this->belongsTo(Ref_Staff::class, 'STAFF_ID', 'STAFF_ID');
    }
}
