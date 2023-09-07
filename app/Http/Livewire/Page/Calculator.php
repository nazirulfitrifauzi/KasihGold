<?php

namespace App\Http\Livewire\Page;

use App\Models\ArrahnuDailyPrice;
use App\Models\ArrahnuRefProductCode;
use Carbon\Carbon;
use Livewire\Component;

class Calculator extends Component
{
    public $gold_types;
    public $duration;
    public $marhun;
    public $total_marhun;
    public $financing;

    protected $rules = [
        'marhun.*.weight' => 'nullable|numeric',
        'financing.*' => 'required|numeric',
    ];

    protected $messages = [
        'financing.*.required' => 'Ruangan ini diperlukan.',
        'marhun.*.weight.numeric' => 'Hanya nombor dibenarkan.',
        'financing.*.numeric' => 'Hanya nombor dibenarkan.',
    ];

    public function mount()
    {
        $this->gold_types = ArrahnuDailyPrice::fetchTodayGoldPriceDetails();

        $from = Carbon::now()->startOfDay(); // This is equivalent to date('Y-m-d')
        $this->duration['from'] = $from->format('d/m/Y');
        $this->duration['day'] = 30 * 18;
        $this->duration['until'] = $from->addDays($this->duration['day'])->format('d/m/Y');

        $this->total_marhun = [
            'weight' => Money(0),
            'price' => Money(0),
        ];

        if ($this->gold_types) {
            foreach ($this->gold_types as $code => $gold) {
                $this->marhun[trim($code)]['total'] = 0;
            }
        }
    }

    public function updated($field)
    {
        $this->validateOnly($field);

        foreach ($this->gold_types as $code => $gold) {
            if ($field == "marhun." . trim($code) . ".weight") {
                $this->marhun[trim($code)]['total'] = ($this->marhun[trim($code)]['weight'] and $this->marhun[trim($code)]['weight'] != "")
                    ? $this->marhun[trim($code)]['weight'] * $gold['price']
                    : 0;
            }
        }
    }

    public function calculateMarhun()
    {
        $weight = 0;
        $total = 0;

        if ($this->gold_types) {
            foreach ($this->marhun as $row) {
                $weight += (isset($row['weight']) and $row['weight']) ? $row['weight'] : 0;
                $total += (isset($row['total']) and $row['total']) ? $row['total'] : 0;
            }

            $this->total_marhun = [
                'weight' => Money($weight),
                'price' => Money($total),
            ];
        }
    }

    public function calculateFinancing()
    {
        $products = ArrahnuRefProductCode::fetchActiveArrahnuProducts();

        foreach ($products as $code => $product) {
            $this->financing[trim($code)]['name'] = $product['description'];
            $this->financing[trim($code)]['max_financing'] = Money(MoneyRound(MoneyToFloat($this->total_marhun['price']) * (MoneyToFloat($product['margin']) / 100)));
            $this->financing[trim($code)]['one_month'] = Money(MoneyRound(MoneyToFloat($this->financing[trim($code)]['max_financing']) * (MoneyToFloat($product['profit']) / 100) * (1 / 12)));
            $this->financing[trim($code)]['full_month'] = Money(MoneyRound(MoneyToFloat($this->financing[trim($code)]['max_financing']) * (MoneyToFloat($product['profit']) / 100) * (18 / 12)));
        }
    }

    public function render()
    {
        $this->calculateMarhun();
        $this->calculateFinancing();

        return view('livewire.page.calculator');
    }
}
