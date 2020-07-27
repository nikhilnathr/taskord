<?php

namespace App\Http\Livewire\Task;

use Livewire\Component;
use Auth;
use App\TaskCommentPraise;

class SingleComment extends Component
{
    public $comment;
    public $confirming;

    public function mount($comment)
    {
        $this->comment = $comment;
    }
    
    public function togglePraise()
    {
        if (Auth::check()) {
            if (Auth::user()->isFlagged) {
                return session()->flash('message', 'Your account is flagged!');
            }
            if (Auth::user()->id === $this->comment->user->id) {
                return session()->flash('message', 'You can\'t praise your own comment!');
            }
            $isPraised = TaskCommentPraise::where([
                ['user_id', Auth::user()->id],
                ['task_comment_id', $this->comment->id],
            ])->count();
            if ($isPraised === 1) {
                $praise = TaskCommentPraise::where([
                    ['user_id', Auth::user()->id],
                    ['task_comment_id', $this->comment->id],
                ])->first();
                $praise->delete();
                $this->comment->refresh();
            } else {
                $praise = TaskCommentPraise::create([
                    'user_id' => Auth::user()->id,
                    'task_comment_id' => $this->comment->id,
                ]);
                $this->comment->refresh();
            }
        } else {
            return session()->flash('message', 'Forbidden!');
        }
    }

    public function confirmDelete()
    {
        $this->confirming = $this->comment->id;
    }

    public function deleteTaskComment()
    {
        if (Auth::check()) {
            if (Auth::user()->isFlagged) {
                return session()->flash('message', 'Your account is flagged!');
            }
            if (Auth::user()->staffShip or Auth::user()->id === $this->comment->user->id) {
                $this->comment->task_comment_praise()->delete();
                $this->comment->delete();
                $this->emit('taskCommentDeleted');
            } else {
                return session()->flash('message', 'Forbidden!');
            }
        } else {
            return session()->flash('message', 'Forbidden!');
        }
    }

    public function render()
    {
        return view('livewire.task.single-comment');
    }
}
