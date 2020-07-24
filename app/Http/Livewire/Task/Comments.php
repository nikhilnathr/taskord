<?php

namespace App\Http\Livewire\Task;

use Livewire\Component;
use App\TaskComments;

class Comments extends Component
{
    public $task;
    
    public function mount($task)
    {
        $this->task = $task;
    }
    
    public function render()
    {
        $comments = TaskComments::where('task_id', $this->task->id)->get();
        
        return view('livewire.task.comments', [
            'comments' => $comments
        ]);
    }
}
