<?php

namespace App\Http\Livewire\Page\Admin;

use App\Models\Newsletter as ModelsNewsletter;
use App\Models\User;
use App\Notifications\Newsletter as NotificationsNewsletter;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class Newsletter extends Component
{
    public function sendEmail()
    {
        $users = User::whereActive(1)->whereClient(2)->whereRole(3)->orWhere('role', 4)->get();
        foreach ($users as $recipient) {
            Notification::send($recipient, new NotificationsNewsletter($recipient));
        }

        ModelsNewsletter::create([
            'type'          => 'user_monthly',
            'status'        => 1,
            'month'         => now()->subMonthsNoOverflow()->format('m'),
            'year'          => now()->subMonthsNoOverflow()->format('Y'),
            'created_at'    => now(),
        ]);

        session()->flash('success');
        session()->flash('title', 'Success!');
        session()->flash('message', 'Newsletter for '. now()->subMonthsNoOverflow()->format('F Y').' has been sent.');
    }

    public function render()
    {
        $newsletter = ModelsNewsletter::where('type', 'user_monthly')
                                        ->where('year', now()->subMonthsNoOverflow()->format('Y'))
                                        ->where('month', now()->subMonthsNoOverflow()->format('m'))
                                        ->orderBy('id', 'desc')
                                        ->first();
        return view('livewire.page.admin.newsletter', [
            'newsletter' => $newsletter,
        ])->extends('default.default');
    }
}
