<?php

namespace App\Http\Livewire\Task;

use Livewire\Component;

class SingleComment extends Component
{
    public $comment;
    
    public function mount($comment)
    {
        $this->comment = $comment;
    }
    
    public function render()
    {
        return view('livewire.task.single-comment');
    }
}
