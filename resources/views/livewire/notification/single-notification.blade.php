<div>
    <div class="card mb-3">
        <div class="card-body">
            <span class="font-weight-bold">{{ \App\User::find($data['user_id'])->username }}</span>
            @if ($type === "App\Notifications\Praised")
                praised your task
            @elseif ($type === "App\Notifications\TaskMentioned")
                mentioned you in a task
            @endif
            <div class="font-weight-bold mt-2">
                {{ $data['task'] }}
            </div>
        </div>
    </div>
</div>
