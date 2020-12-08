<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackCategory extends Model
{
    use HasFactory;

    public function subcategory(){
        return $this->hasMany('App\Models\FeedbackSubCategory', 'category_id', 'id');
    }

    public function list(){
        return $this->hasMany('App\Models\FeedbackList', 'category_id', 'id');
    }
}
