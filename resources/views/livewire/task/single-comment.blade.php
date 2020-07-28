<div class="card-body">
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{ session('error') }}
        </div>
    @endif
    <div class="align-items-center d-flex">
        <img class="avatar-40 rounded-circle" src="{{ $comment->user->avatar }}" />
        <span class="ml-2">
            <a href="{{ route('user.done', ['username' => $comment->user->username]) }}" class="font-weight-bold text-dark">
                {{ $comment->user->firstname ? $comment->user->firstname . ' ' . $comment->user->lastname : '' }}
            </a>
            <div class="small">{{ "@" . $comment->user->username }}</div>
        </span>
        <span class="align-text-top small float-right ml-auto">
            {{ Carbon::parse($comment->created_at)->diffForHumans() }}
        </span>
    </div>
    <span class="ml-1 task-font">
        @markdown($comment->comment)
    </span>
    <div>
        @auth
        @if (Auth::user()->task_comment_praise->where('task_comment_id', $comment->id)->count() === 1)
            <button type="button" class="btn btn-task btn-success text-white mr-1" wire:click="togglePraise" wire:loading.attr="disabled">
                {{ Emoji::clappingHands() }}
                <span class="small text-dark font-weight-bold">
                    {{ $comment->task_comment_praise->count() }}
                </span>
            </button>
        @else
            <button type="button" class="btn btn-task btn-outline-success mr-1" wire:click="togglePraise" wire:loading.attr="disabled">
                {{ Emoji::clappingHands() }}
                @if ($comment->task_comment_praise->count() !== 0)
                <span class="small text-dark font-weight-bold">
                    {{ $comment->task_comment_praise->count() }}
                </span>
                @endif
            </button>
        @endif
        @if (Auth::user()->staffShip or Auth::user()->id === $comment->user->id)
            @if ($confirming === $comment->id)
            <button type="button" class="btn btn-task btn-danger" wire:click="deleteTaskComment" wire:loading.attr="disabled">
                Are you sure?
                <span wire:target="deleteTaskComment" wire:loading class="spinner-border spinner-border-mini ml-2" role="status"></span>
            </button>
            @else
            <button type="button" class="btn btn-task btn-outline-danger" wire:click="confirmDelete" wire:loading.attr="disabled">
                {{ Emoji::wastebasket() }}
            </button>
            @endif
        @endif
        @endauth
        @guest
            <a href="/login" class="btn btn-task btn-outline-success mr-1">
                {{ Emoji::clappingHands() }}
                @if ($comment->task_comment_praise->count() !== 0)
                <span class="small text-dark font-weight-bold">
                    {{ $comment->task_comment_praise->count() }}
                </span>
                @endif
            </a>
        @endguest
    </div>
</div>
