<div>
    <div class="card mb-3">
        <div class="card-body">
            <span class="font-weight-bold">
                @if ($type === "App\Notifications\Praised")
                    {{ Emoji::clappingHands() }}
                @elseif ($type === "App\Notifications\TaskMentioned")
                    {{ Emoji::raisedHand() }}
                @endif
                {{
                    \App\User::find($data['user_id'])->firstname ?
                    \App\User::find($data['user_id'])->firstname . ' ' . \App\User::find($data['user_id'])->lastname : ''
                }}
            </span>
            @if ($type === "App\Notifications\Praised")
                praised your task
            @elseif ($type === "App\Notifications\TaskMentioned")
                mentioned you in a task
            @endif
            <div class="font-weight-bold mt-2">
                <a class="text-dark" href="{{ route('task', ['id' => $data['task_id']]) }}">
                    {{ $data['task'] }}
                </a>
            </div>
            <div class="small mt-2 text-secondary">
                {{ Carbon::createFromTimeStamp(strtotime($created_at))->diffForHumans() }}
            </div>
        </div>
    </div>
</div>
