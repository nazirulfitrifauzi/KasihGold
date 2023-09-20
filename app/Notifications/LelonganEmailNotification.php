<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LelonganEmailNotification extends Notification
{
    use Queueable;

    private $message;
    private $user;
    private $lelongan;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($message, $user, $lelongan)
    {
        $this->message = $message;
        $this->user = $user;
        $this->lelongan = $lelongan;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('MAKLUMAN LELONGAN MELALUI ' . strtoupper(config('app.name')) . ' (PERMOHONAN SEDANG DIPROSES)')
            ->view('emails.KAP.lelongan', [
                'userId' => $this->user->profile->code,
                'userName' => $this->user->name,
                'ic' => $this->user->profile->ic,
                'siriNo' => $this->lelongan->siri_no,
                'bidId' => $this->lelongan->bid_id,
                'rezab' => $this->lelongan->rezab,
                'bidPrice' => $this->lelongan->bid,
            ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
