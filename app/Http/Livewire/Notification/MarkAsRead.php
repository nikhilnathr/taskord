<?php

namespace App\Http\Livewire\Notification;

use Livewire\Component;
use Auth;

class MarkAsRead extends Component
{
    public function markAsRead()
    {
        Auth::user()->notifications()->delete();
        $this->emitUp('markAsRead');
    }
    
    public function render()
    {
        return view('livewire.notification.mark-as-read');
    }
}
