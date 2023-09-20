<?php

namespace App\Services;

use App\Models\ArrahnuAuctionList;
use App\Models\SiskopArrahnuLelongan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\TemporaryUploadedFile;

class BidService
{
    protected $selectedSiri;
    protected $bids;
    protected $file;

    const BID_STEP = 1;
    const BID_FLAG = 20;

    public function __construct($selectedSiri, $bids, TemporaryUploadedFile $file = null)
    {
        $this->selectedSiri = $selectedSiri;
        $this->bids = $bids;
        $this->file = $file;
    }

    public function processBids()
    {
        $uniqueId = uniqid();
        $user = auth()->user();
        $cif = $this->getCustomerId($user);
        $filename = $this->uploadFile($user, $uniqueId);

        return $this->storeBids($cif, $uniqueId, $filename, $user);
    }

    protected function getCustomerId($user): int
    {
        $result = DB::select("EXEC arrahnu_kap.ARRAHNU.sp_ar_insert_cust_kap_to_cif '" . $user->id . "'");
        return $result[0]->id;
    }

    protected function uploadFile($user, $uniqueId): string
    {
        $fileExtension = $this->file->getClientOriginalExtension();
        $filePath = "public/Files/{$user->id}/lelongan/{$uniqueId}";
        $fileName = "lelongan.{$fileExtension}";
        Storage::disk('local')->putFileAs($filePath, $this->file, $fileName);

        return url(Storage::url("{$filePath}/{$fileName}"));
    }

    protected function storeBids($cif, $uniqueId, $filename, $user)
    {
        $storedLelongans = [];

        foreach ($this->bids as $siri => $value) {
            if ($value) {
                $amtRezab = ArrahnuAuctionList::where('SIRI_NO', $siri)->value('AMT_REZAB');
                $lelongan = SiskopArrahnuLelongan::create([
                    'cust_id' => $cif,
                    'icno' => $user->profile->ic,
                    'step' => self::BID_STEP,
                    'flag' => self::BID_FLAG,
                    'bid_id' => $uniqueId,
                    'siri_no' => $siri,
                    'bid' => $value,
                    'rezab' => $amtRezab,
                    'files' => $filename,
                    'bid_at' => now(),
                    'branch_id' => substr($siri, 4, 1),
                    'created_at' => now()
                ]);

                $storedLelongans[] = $lelongan;
            }
        }

        return $storedLelongans;
    }
}
