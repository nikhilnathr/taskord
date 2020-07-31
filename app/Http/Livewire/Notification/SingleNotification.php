<?php

namespace App\Http\Livewire\Notification;

use Livewire\Component;

class SingleNotification extends Component
{
    public $type;
    public $data;
    
    public function mount($type, $data)
    {
        $this->type = $type;
        $this->data = $data;
    }
    
    public function render()
    {
        return view('livewire.notification.single-notification');
    }
}
