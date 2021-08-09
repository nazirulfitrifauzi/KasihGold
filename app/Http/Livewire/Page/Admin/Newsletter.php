<?php

namespace App\Http\Livewire\Page\Admin;

use App\Models\User;
use App\Notifications\Newsletter as NotificationsNewsletter;
use Illuminate\Support\Facades\Notification;
// use Illuminate\Notifications\Notification;
use Livewire\Component;

class Newsletter extends Component
{
    public $users;
    public $data;

    public function mount()
    {
        $this->users = User::whereActive(1)->whereClient(2)->whereRole(3)->orWhere('role',4)->get();
    }

    public function sendEmail()
    {
        $users = User::whereActive(1)->whereClient(2)->whereRole(3)->orWhere('role', 4)->get();
        foreach ($users as $recipient) {
            Notification::send($recipient, new NotificationsNewsletter($recipient));
        }
    }

    public function render()
    {
        return view('livewire.page.admin.newsletter')->extends('default.default');
    }
}
