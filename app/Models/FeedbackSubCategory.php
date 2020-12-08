<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackSubCategory extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo('App\Models\FeedbackCategory', 'category_id', 'id');
    }

    public function list(){
        return $this->hasMany('App\Models\FeedbackList', 'sub_category_id', 'id');
    }
}
