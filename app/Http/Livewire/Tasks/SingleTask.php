<?php

namespace App\Http\Livewire\Tasks;

use Livewire\Component;
use App\Task;
use Auth;
use Carbon\Carbon;
use App\Gamify\Points\TaskCompleted;

class SingleTask extends Component
{
    public $task;
    
    public function mount($task)
    {
        $this->task = $task;
    }
    
    public function checkTask()
    {
        if (Auth::check()) {
            $this->task->done = ! $this->task->done;
            $this->task->done_at = Carbon::now();
            $this->task->updated_at = Carbon::now();
            givePoint(new TaskCompleted($this->task));
            $this->task->save();
            $this->emitUp('taskChecked');

            return true;
        } else {
            return session()->flash('error', 'Forbidden!');
        }
    }
    
    public function render()
    {
        return view('livewire.tasks.single-task');
    }
}
