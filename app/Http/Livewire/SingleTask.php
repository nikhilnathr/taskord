<?php

namespace App\Http\Livewire;

use App\Gamify\Points\PraiseCreated;
use App\Gamify\Points\TaskCompleted;
use App\Gamify\Points\TaskCreated;
use App\TaskPraise;
use App\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Livewire\Component;

class SingleTask extends Component
{
    public $task;
    public $confirming;

    public function mount($task)
    {
        $this->task = $task;
    }

    public function checkTask()
    {
        if (Auth::check()) {
            if (Auth::user()->id === $this->task->user->id) {
                if ($this->task->done) {
                    undoPoint(new TaskCompleted($this->task));
                } else {
                    givePoint(new TaskCompleted($this->task));
                }
                $this->task->done = ! $this->task->done;
                $this->task->save();
                $this->emitUp('taskChecked');

                return true;
            } else {
                return session()->flash('message', 'Forbidden!');
            }
        } else {
            return session()->flash('message', 'Forbidden!');
        }
    }

    public function togglePraise()
    {
        if (Auth::check()) {
            if (Auth::user()->isFlagged) {
                return session()->flash('message', 'Your account is flagged!');
            }
            if (Auth::user()->id === $this->task->user->id) {
                return session()->flash('message', 'You can\'t praise your own task!');
            }
            $isPraised = TaskPraise::where([
                ['user_id', Auth::user()->id],
                ['task_id', $this->task->id],
            ])->count();
            if ($isPraised === 1) {
                $praise = TaskPraise::where([
                    ['user_id', Auth::user()->id],
                    ['task_id', $this->task->id],
                ])->first();
                undoPoint(new PraiseCreated($praise));
                $praise->delete();
                $this->task->refresh();
            } else {
                $praise = TaskPraise::create([
                    'task_id' => $this->task->id,
                    'user_id' => Auth::user()->id,
                ]);
                $this->task->refresh();
                givePoint(new PraiseCreated($praise));
            }
        } else {
            return session()->flash('message', 'Forbidden!');
        }
    }

    public function confirmDelete()
    {
        $this->confirming = $this->task->id;
    }

    public function deleteTask()
    {
        if (Auth::check()) {
            if (Auth::user()->isFlagged) {
                return session()->flash('message', 'Your account is flagged!');
            }
            if (Auth::user()->id === $this->task->user->id) {
                Auth::user()->undoPoint(new TaskCreated($this->task));
                $this->task->delete();
                $this->emitUp('taskDeleted');
            } else {
                return session()->flash('message', 'Forbidden!');
            }
        } else {
            return session()->flash('message', 'Forbidden!');
        }
    }

    public function render()
    {
        return view('livewire.single-task');
    }
}
