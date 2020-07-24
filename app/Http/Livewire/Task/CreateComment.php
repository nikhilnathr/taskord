<?php

namespace App\Http\Livewire\Task;

use Livewire\Component;

class CreateComment extends Component
{
    public $comment;
    
    public function render()
    {
        return view('livewire.task.create-comment');
    }
}
