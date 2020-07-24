<?php

namespace App\Http\Livewire\Task;

use Livewire\Component;
use Auth;
use App\TaskComments;
use App\Gamify\Points\CommentCreated;

class CreateComment extends Component
{
    public $comment;
    public $task;
    
    public function mount($task)
    {
        $this->task = $task;
    }
    
    public function submit()
    {
        $validatedData = $this->validate([
            'comment' => 'required|profanity',
        ],
        [
            'task.profanity' => 'Please check your words!',
        ]);

        if (Auth::user()->isFlagged) {
            return session()->flash('error', 'Your account is flagged!');
        }

        $comment = TaskComments::create([
            'user_id' =>  Auth::user()->id,
            'task_id' =>  $this->task->id,
            'comment' => $this->comment,
        ]);

        $this->emit('commentAdded');
        $this->comment = '' ;
        Auth::user()->givePoint(new CommentCreated($comment));

        return session()->flash('success', 'Comment has been added!');
    }
    
    public function render()
    {
        return view('livewire.task.create-comment');
    }
}
