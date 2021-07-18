<?php

namespace App\Http\Livewire\Page;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\FeedbackCategory;
use App\Models\FeedbackSubCategory;
use App\Models\FeedbackList;

class IncidentReporting extends Component
{
    public $subcategories = [];
    public $category;
    public $subcategory;
    public $title;
    public $comment;

    protected $rules = [
        'category'      => 'required',
        'subcategory'   => 'required_with:category',
        'title'         => 'required',
        'comment'       => 'required',
    ];

    public function submit()
    {
        $rules = $this->validate([
            'category'      => 'required',
            'subcategory'   => 'required_with:category',
            'title'         => 'required',
            'comment'       => 'required',
        ]);

        FeedbackList::create([
            'uuid'              => (string) Str::uuid(),
            'category_id'       => $this->category,
            'sub_category_id'   => $this->subcategory,
            'title'             => $this->title,
            'comment'           => $this->comment,
            'created_by'        => auth()->user()->id,
        ]);
        
        $category_name      = FeedbackCategory::where('id',$this->category)->first()->name;
        $subcategory_name   = FeedbackSubCategory::where('id',$this->subcategory)->first()->name;

      
		session()->flash('success');
        session()->flash('title', 'Success!');
        session()->flash('message', $category_name.' - '.$subcategory_name.' successfully sent.');
    }

    public function render()
    {
        if(!empty($this->category)) {
            $this->subcategories = FeedbackSubCategory::where('category_id', $this->category)->get();
        }else{
            $this->subcategory = "";
            $this->subcategories = [];
        }

        return view('livewire.page.incident-reporting')->withCategories(FeedbackCategory::all());
    }
}
