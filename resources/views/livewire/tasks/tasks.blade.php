<ul class="list-group list-group-flush">
    @foreach($tasks as $task)
        @livewire('tasks.single-task', [
            'task' => $task
        ], key($task->id))
    @endforeach
</ul>
