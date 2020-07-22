<li class="list-group-item p-3">
    <div class="align-items-center d-flex">
        <img class="avatar-40 rounded-circle" src="{{ $task->user->avatar }}" />
        <span class="ml-2">
            <a href="{{ route('user.done', ['username' => $task->user->username]) }}" class="font-weight-bold text-dark">
                {{ $task->user->firstname ? $task->user->firstname . ' ' . $task->user->lastname : '' }}
            </a>
            <div class="small">{{ "@" . $task->user->username }}</div>
        </span>
        <span class="align-text-top small float-right text-black-50 ml-auto">{{ Carbon::parse($task->done_at)->diffForHumans() }}</span>
    </div>
    <div class="mt-3 mb-1">
        <input
            class="form-check-input"
            type="checkbox"
            wire:click="checkTask"
            {{ $task->done ? "checked" : "unchecked" }}
            {{
                Auth::check() &&
                Auth::user()->id === $task->user_id ?
                "enabled" : "disabled"
            }}
        />
        <span class="ml-1 task-font">
            {!! Purify::clean(preg_replace('/#(\w+)/', '<a href="product/$1">#$1</a>', $task->task)) !!}
        </span>
        @if ($task->image)
        <div>
            <img class="img-fluid border mt-3 rounded" src="{{ asset('storage/' . $task->image) }}" />
        </div>
        @endif
        <div class="mt-2">
            @auth
            @if (Auth::user()->task_praise->where('task_id', $task->id)->count() === 1)
                <button type="button" class="btn btn-task btn-success text-white mr-1" wire:click="togglePraise" wire:loading.attr="disabled">
                    👏
                    <span class="small text-white font-weight-bold">
                        {{ $task->task_praise->count() }}
                    </span>
                </button>
            @else
                <button type="button" class="btn btn-task btn-outline-success mr-1" wire:click="togglePraise" wire:loading.attr="disabled">
                    👏
                    <span class="small text-black-50 font-weight-bold">
                        {{ $task->task_praise->count() }}
                    </span>
                </button>
            @endif
            @endauth
            @guest
                <a href="/login" class="btn btn-task btn-outline-success mr-1">
                    👏
                    <span class="small text-black-50 font-weight-bold">
                        {{ $task->task_praise->count() }}
                    </span>
                </a>
            @endguest
            @if (Auth::check() && Auth::user()->id === $task->user->id)
                @if($confirming === $task->id)
                <button type="button" class="btn btn-task btn-danger" wire:click="deleteTask" wire:loading.attr="disabled">
                    Are you sure?
                </button>
                @else
                <button type="button" class="btn btn-task btn-outline-danger" wire:click="confirmDelete" wire:loading.attr="disabled">
                    🗑
                </button>
                @endif
            @endif
        </div>
        @if (session()->has('message'))
            <div class="alert alert-danger alert-dismissible fade show mt-3">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ session('message') }}
            </div>
        @endif
    </div>
</li>
