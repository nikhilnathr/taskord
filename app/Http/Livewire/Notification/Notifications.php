<?php

namespace App\Http\Livewire\Notification;

use Livewire\Component;
use Auth;

class Notifications extends Component
{
    public function render()
    {
        return view('livewire.notification.notifications', [
            'notifications' => Auth::user()->notifications,
        ]);
    }
}
