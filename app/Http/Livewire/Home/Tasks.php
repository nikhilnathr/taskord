<?php

namespace App\Http\Livewire\Home;

use App\Task;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Livewire\Component;

class Tasks extends Component
{
    public $listeners = [
        'taskAdded' => 'render',
        'taskDeleted' => 'render',
        'taskChecked' => 'render',
    ];

    public $page;
    public $perPage;

    public function mount($page, $perPage)
    {
        $this->page = $page ? $page : 1;
        $this->perPage = $perPage ? $perPage : 1;
    }

    public function paginate($items, $options = [])
    {
        $page = $this->page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);

        return new LengthAwarePaginator($items->forPage($page, $this->perPage), $items->count(), $this->perPage, $page, $options);
    }

    public function render()
    {
        $tasks = Task::where('done', true)
            ->orderBy('created_at', 'desc')
            ->orderBy('done_at', 'desc')
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->done_at)->format('d-M-y');
            });

        return view('livewire.home.tasks', [
            'tasks' => $this->paginate($tasks),
            'page' => $this->page,
        ]);
    }
}
