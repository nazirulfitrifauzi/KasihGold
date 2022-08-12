<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class outrightSGRecords extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'outright_sg_records';
    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function exit()
    {
        return $this->belongsTo('App\Models\outrightSG', 'exit_id', 'id');
    }
}
