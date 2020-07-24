<li class="list-group-item p-3">
    <div class="align-items-center d-flex">
        <img class="avatar-40 rounded-circle" src="{{ $task->user->avatar }}" />
        <span class="ml-2">
            <a href="{{ route('user.done', ['username' => $task->user->username]) }}" class="font-weight-bold text-dark">
                {{ $task->user->firstname ? $task->user->firstname . ' ' . $task->user->lastname : '' }}
                @if ($task->user->isPatron)
                    <a class="ml-1 small" href="{{ route('patron') }}" data-toggle="tooltip" data-placement="right" title="Patron">
                        {{Emoji::handshake()}}
                    </a>
                @endif
            </a>
            <div class="small">{{ "@" . $task->user->username }}</div>
        </span>
        <span class="align-text-top small float-right ml-auto">
            <a class="text-black-50" href="{{ route('task', ['id' => $task->id]) }}">
                {{ !$task->done_at ? Carbon::parse($task->created_at)->diffForHumans() : Carbon::parse($task->done_at)->diffForHumans() }}
            </a>
        </span>
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
                    {{Emoji::clappingHands()}}
                    <span class="small text-white font-weight-bold">
                        {{ $task->task_praise->count() }}
                    </span>
                </button>
            @else
                <button type="button" class="btn btn-task btn-outline-success mr-1" wire:click="togglePraise" wire:loading.attr="disabled">
                    {{Emoji::clappingHands()}}
                    <span class="small text-black-50 font-weight-bold">
                        {{ $task->task_praise->count() }}
                    </span>
                </button>
            @endif
            @endauth
            @guest
                <a href="/login" class="btn btn-task btn-outline-success mr-1">
                    {{Emoji::clappingHands()}}
                    <span class="small text-black-50 font-weight-bold">
                        {{ $task->task_praise->count() }}
                    </span>
                </a>
            @endguest
            @auth
                <a href="{{ route('task', ['id' => $task->id]) }}" class="btn btn-task btn-outline-primary mr-1">
                    {{Emoji::speechBalloon()}}
                    <span class="small text-black-50 font-weight-bold">
                        {{ $task->task_comments->count() }}
                    </span>
                </a>
            @endauth
            @guest
                <a href="/login" class="btn btn-task btn-outline-primary mr-1">
                    {{Emoji::speechBalloon()}}
                    <span class="small text-black-50 font-weight-bold">
                        {{ $task->task_comments->count() }}
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
