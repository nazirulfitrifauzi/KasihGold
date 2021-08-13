<?php

namespace App\Mail\PhysicalDetails;

use App\Models\PhysicalConvert;
use App\Models\ToyyibBills;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PhysicalGoldExchange extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $phyConv, $toyyibBill;

    public function __construct(PhysicalConvert $phyConv, ToyyibBills $toyyibBill)
    {
        $this->phyConv = $phyConv;
        $this->toyyibBill = $toyyibBill;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.PhysicalDetails.physical-gold-exchange');
    }
}
