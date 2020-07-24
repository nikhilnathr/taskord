<div class="card-body pb-1">
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
</div>
