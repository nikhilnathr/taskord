<?php

namespace App\Http\Livewire\Tasks;

use App\Task;
use Auth;
use Livewire\Component;

class AllTime extends Component
{
    public $listeners = [
        'taskChecked' => 'render',
        'taskAdded' => 'render',
        'taskDeleted' => 'render',
    ];

    public function render()
    {
        $tasks = Task::doNotCache()
            ->select('id', 'task', 'done', 'user_id')
            ->where('user_id', Auth::id())
            ->where('done', false)
            ->latest()
            ->get();

        return view('livewire.tasks.all-time', [
            'tasks' => $tasks,
        ]);
    }
}
