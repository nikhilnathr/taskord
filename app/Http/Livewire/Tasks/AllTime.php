<?php

namespace App\Http\Livewire\Tasks;

use App\Task;
use Auth;
use Livewire\Component;
use Carbon\Carbon;

class AllTime extends Component
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

        return view('livewire.tasks.all-time', [
            'tasks' => $tasks,
        ]);
    }
}
