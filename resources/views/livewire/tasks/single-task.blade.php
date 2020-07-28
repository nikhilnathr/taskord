<li class="list-group-item pt-2 pb-2">
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <i class="fa fa-times mr-1"></i>
            {{ session('error') }}
        </div>
    @endif
    <div>
        <input
            class="form-check-input"
            type="checkbox"
            wire:click="checkTask"
            unchecked
        />
        <span class="ml-1 task-font">
            {!! Purify::clean(preg_replace('/#(\w+)/', '<a href="product/$1">#$1</a>', $task->task)) !!}
        </span>
        <span class="d-flex small float-right ml-auto">
            @if (Auth::user()->id === $task->user->id)
                @if ($confirming === $task->id)
                <button type="button" class="btn btn-task btn-danger" wire:click="deleteTask" wire:loading.attr="disabled">
                    Are you sure?
                    <span wire:target="deleteTask" wire:loading class="spinner-border spinner-border-mini ml-2" role="status"></span>
                </button>
                @else
                <button type="button" class="btn btn-task btn-outline-danger" wire:click="confirmDelete" wire:loading.attr="disabled">
                    {{ Emoji::wastebasket() }}
                </button>
                @endif
            @endif
            <a class="ml-3 text-black-50" href="{{ route('task', ['id' => $task->id]) }}">
                {{ !$task->done_at ? Carbon::parse($task->created_at)->diffForHumans() : Carbon::parse($task->done_at)->diffForHumans() }}
            </a>
        </span>
        @if ($task->image)
        <div>
            <img class="img-fluid border mt-3 rounded" src="{{ asset('storage/' . $task->image) }}" />
        </div>
        @endif
    </div>
</li>
