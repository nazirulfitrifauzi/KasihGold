<?php

namespace App\Http\Livewire\Page\Lelongan;

use App\Models\ArrahnuAuctionList;
use App\Models\ArrahnuSystemSetting;
use App\Services\BidService;
use App\Services\NotificationService;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Lelongan extends Component
{
    use WithPagination, WithFileUploads;

    public $selectedSiri = [];
    public $bids = [];
    public $settingCajBida = 0;
    public $cajBida = 0;
    public $file;

    public function getRules()
    {
        return [
            'bids.*' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/', function ($attribute, $value, $fail) {
                $siriNo = explode('.', $attribute)[1]; // Extract the SIRI_NO from the attribute name
                $amtRezab = ArrahnuAuctionList::where('SIRI_NO', $siriNo)->value('AMT_REZAB');

                if ($value < $amtRezab) {
                    $fail("Bidaan mesti lebih daripada Rezab");
                }
            }],
            'file' => 'required|mimes:jpg,jpeg,png,pdf|max:2048'
        ];
    }

    protected $messages = [
        'bids.*.required' => 'Bidaan diperlukan',
        'bids.*.numeric' => 'Hanya nombor dibenarkan.',
        'bids.*.regex' => 'Hanya 2 titik perpuluhan.',
    ];

    public function mount()
    {
        $systemData = ArrahnuSystemSetting::whereCode('OT002')->first();
        $this->settingCajBida = $systemData->value;
    }

    public function addSelected($id)
    {
        // Only add the ID if it's not already in the array
        if (!array_key_exists($id, $this->selectedSiri)) {
            $amtRezab = ArrahnuAuctionList::where('SIRI_NO', $id)->value('AMT_REZAB');
            $this->selectedSiri[$id] = $amtRezab;

            // Initialize the bid for this item with a null value
            $this->bids[$id] = null;

            $this->cajBida = count($this->selectedSiri) * $this->settingCajBida;
        }
    }

    public function calculateTotalBid()
    {
        return array_sum($this->bids);
    }

    public function submitBidaan()
    {
        $this->validate($this->getRules());

        $bidService = new BidService($this->selectedSiri, $this->bids, $this->file);
        $lelongans = $bidService->processBids();

        $notificationService = new NotificationService();
        foreach ($lelongans as $lelongan) {
            // Send Email Notification
            $notificationService->sendEmailNotification(auth()->user(), $lelongan);

            // Send SMS Notification
            $notificationService->sendSMSNotification(auth()->user(), $lelongan);
        }

        $this->emit('loadingUpdated');

        session()->flash('success');
        session()->flash('title', 'Berjaya!');
        session()->flash('message', 'Lelongan berjaya didaftarkan.');

        return redirect()->to(route('home'));
    }

    public function render()
    {
        $lelong = ArrahnuAuctionList::with(['pawnDetails'])
                        ->where('AUCTION_STATUS', 'BUKA')
                        ->whereRaw('isnull(AMT_REZAB, 0) > 0')
                        ->orderBy('SIRI_NO')
                        ->paginate(15);

        return view('livewire.page.lelongan.lelongan', compact('lelong'))->extends('default.default');
    }
}
