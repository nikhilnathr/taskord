<?php

namespace App\Http\Livewire\Tasks;

use App\Task;
use Auth;
use Carbon\Carbon;
use Livewire\Component;

class Today extends Component
{
    public $listeners = [
        'taskChecked' => 'render',
        'taskAdded' => 'render',
        'taskDeleted' => 'render',
    ];

    public function render()
    {
        $tasks = Task::where('user_id', Auth::user()->id)
            ->whereDate('created_at', Carbon::today())
            ->where('done', false)
            ->latest()
            ->get();

        return view('livewire.tasks.today', [
            'tasks' => $tasks,
        ]);
    }
}
