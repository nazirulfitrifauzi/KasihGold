<?php

namespace App\Http\Livewire\Page\Setting;

use App\Models\InvItem;
use App\Models\OutrightPrice as ModelsOutrightPrice;
use Livewire\Component;

class OutrightPrice extends Component
{

    public $items;
    public $item_id;

    public function mount()
    {
        $this->items = InvItem::leftJoin('outright_price', 'inv_items.id', '=', 'outright_price.item_id')
            ->select('inv_items.*', 'outright_price.price')
            ->where('inv_items.client', 2)
            ->where('inv_items.id', '!=', '12')
            ->where('inv_items.id', '!=', '6')
            ->where('inv_items.id', '!=', '7')
            ->where('inv_items.id', '!=', '8')
            ->get();
    }

    protected $rules = [
        'items.*' => 'required',
        'items.*.id' => 'required',
        'items.*.price' => 'required|between:0.01,99.99',
    ];

    public function submit()
    {
        $this->validate();

        $max = $this->items->count();
        for ($x = 0; $x < $max; $x++) {
            ModelsOutrightPrice::updateOrCreate([
                'item_id'       => $this->items[$x]['id'],
            ], [
                'price'         => $this->items[$x]['price'],
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
        }

        session()->flash('success');
        session()->flash('title', 'Success!');
        session()->flash('message', 'Outright Price successfully updated.');
    }

    public function render()
    {
        return view('livewire.page.setting.outright-price');
    }
}


// <?php

// namespace App\Http\Livewire\Page\Setting;

// use App\Models\MintingGoldPrice;
// use Livewire\Component;

// class MintingPrice extends Component
// {

//     public $items;

//     public function mount()
//     {
//         $this->items = MintingGoldPrice::all();
//     }

//     protected $rules = [
//         'items.*' => 'required',
//         'items.*.id' => 'required',
//         'items.*.minting_cost' => 'required|between:0.01,99.99',
//     ];

//     public function submit()
//     {
//         $this->validate();

//         $max = $this->items->count();
//         for ($x = 0; $x < $max; $x++) {
//             MintingGoldPrice::updateOrCreate([
//                 'id'       => $this->items[$x]['id']
//             ], [
//                 'minting_cost'    => $this->items[$x]['minting_cost'],
//                 'updated_at'    => now(),
//             ]);
//         }

//         session()->flash('success');
//         session()->flash('title', 'Success!');
//         session()->flash('message', 'Minting Price successfully updated.');
//     }



//     public function render()
//     {
//         return view('livewire.page.setting.minting-price');
//     }
// }
