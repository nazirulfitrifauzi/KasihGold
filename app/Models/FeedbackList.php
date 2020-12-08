<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackList extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];

    public function category(){
        return $this->belongsTo('App\Models\FeedbackCategory', 'category_id', 'id');
    }

    public function subcategory(){
        return $this->belongsTo('App\Models\FeedbackSubCategory', 'sub_category_id', 'id');
    }

    public function reported_by(){
        return $this->belongsTo('App\Models\User', 'created_by', 'id');
    }
}
