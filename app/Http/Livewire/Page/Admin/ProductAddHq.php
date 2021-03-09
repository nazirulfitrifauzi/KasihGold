<?php

namespace App\Http\Livewire\Page\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\InvInfo;

class ProductAddHq extends Component
{

    use WithFileUploads;

    public $prod_name, $prod_desc, $prod_price, $prod_code, $prod_img1, $prod_img2, $prod_img3, $prod_img4;

    public function save()
    {
        $this->validate([
            'prod_img1' => 'image|max:4096', // 4MB Max
            'prod_img2' => 'image|max:4096', // 4MB Max
            'prod_img3' => 'image|max:4096', // 4MB Max
            'prod_img4' => 'image|max:4096', // 4MB Max
        ]);

        InvInfo::create([
            'user_id'          => auth()->user()->id,
            'prod_name'        => $this->prod_name,
            'prod_desc'        => $this->prod_desc,
            'prod_price'       => $this->prod_price,
            'prod_code'        => $this->prod_code,
            'prod_img1'        => $this->prod_img1->store('public/prodImg'),
            'prod_img2'        => $this->prod_img2->store('public/prodImg'),
            'prod_img3'        => $this->prod_img3->store('public/prodImg'),
            'prod_img4'        => $this->prod_img4->store('public/prodImg'),
            'created_by'       => auth()->user()->id,
            'updated_by'       => auth()->user()->id,
            'created_at'       => now(),
            'updated_at'       => now(),
        ]);

        session()->flash('message', 'Product successfully added to the database!');
        return redirect()->to('/admin/product/sell');
    }

    public function render()
    {
        return view('livewire.page.admin.product-add-hq');
    }
}
