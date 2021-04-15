<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Notifications\Messages\BroadcastMessage;

class ScreeningNotification extends Notification implements ShouldBroadcast
{
    use Queueable;

    public string $status;
    public string $title;
    public string $message;

    public function __construct(int $id, string $status, string $title, string $message)
    {
        $this->id = $id;
        $this->status = $status;
        $this->title = $title;
        $this->message = $message;
    }

    public function via($notifiable): array
    {
        return ['broadcast'];
    }

    public function toBroadcast($notifiable): BroadcastMessage
    {
        if ($notifiable->id == $this->id) {
            return new BroadcastMessage([
                'status' => "$this->status",
                'title' => "$this->title",
                'message' => "$this->message"
            ]);
        } else {
            //
        }
    }

    // public function toMail($notifiable)
    // {
    //     return (new MailMessage)
    //                 ->line('The introduction to the notification.')
    //                 ->action('Notification Action', url('/'))
    //                 ->line('Thank you for using our application!');
    // }

    // public function toArray($notifiable)
    // {
    //     return [
    //         //
    //     ];
    // }
}
