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
        $endLastMonth = now()->subMonthsNoOverflow()->endOfMonth();
        $thisMonth = now();
        $name = strtoupper($this->user->name);
        $gram = number_format(($this->user->gold->where('active_ownership', 1)->sum('weight')), 2);

        return (new MailMessage)->subject('Simpanan Emas Digital anda sehingga ' . $endLastMonth->formatLocalized('%B %Y'))
            ->view('emails.admin.newsletter.userMonthly', [
                    'endLastMonth'  => $endLastMonth,
                    'thisMonth'     => $thisMonth,
                    'name'          => $name,
                    'gram'          => $gram,
                ]
            );
    }
}
