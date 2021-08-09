<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Newsletter extends Notification implements ShouldQueue
{
    use Queueable;

    private $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $endLastMonth = now()->subMonthsNoOverflow()->endOfMonth()->formatLocalized('%d %B %Y');
        $thisMonth = now()->formatLocalized('%B %Y');
        $name = strtoupper($this->user->name);
        $gram = number_format(($this->user->gold->where('active_ownership', 1)->sum('weight')), 2);

        return (new MailMessage)
            ->subject('Simpanan Emas Digital anda sehingga '.$endLastMonth)
            ->greeting('Pelanggan-pelanggan yang dihormati sekelian,')
            ->line('Terima kasih '.$name.' kerana menjadi pelanggan kami.')
            ->line('Untuk makluman tuan/puan sehingga '.$endLastMonth.' simpanan emas digital tuan/puan adalah sebanyak '.$gram.' gram.')
            ->line('Teruskan simpanan emas tuan/puan sepanjang bulan '.$thisMonth.'.')
            ->line('Sekiranya tuan/puan mempunyai sebarang persoalan sila hubungi kami di:')
            ->line('customersupport@kasihapgold.com atau whatapps kami di 0127499771');
    }
}
