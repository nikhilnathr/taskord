<?php

namespace App\Http\Livewire\Notification;

use Livewire\Component;
use Auth;

class Delete extends Component
{
    public function markAsRead()
    {
        Auth::user()->notifications()->delete();
        $this->emit('deleteAll');
    }
    
    public function render()
    {
        return view('livewire.notification.delete');
    }
}
