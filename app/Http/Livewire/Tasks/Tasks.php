<?php

namespace App\Http\Livewire\Tasks;

use App\Task;
use Auth;
use Livewire\Component;

class Tasks extends Component
{
    public $listeners = [
        'taskChecked' => 'render',
        'taskAdded' => 'render',
    ];

    public function render()
    {
        $tasks = Task::where('user_id', Auth::user()->id)
            ->where('done', false)
            ->latest()
            ->get();

        return view('livewire.tasks.tasks', [
            'tasks' => $tasks,
        ]);
    }
}
