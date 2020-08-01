<div>
    <div class="card mb-3">
        <div class="card-body">
            <span class="font-weight-bold">
                @if (
                    $type === "App\Notifications\TaskPraised" or
                    $type === "App\Notifications\QuestionPraised" or
                    $type === "App\Notifications\AnswerPraised" or
                    $type === "App\Notifications\TaskCommentPraised"
                )
                    {{ Emoji::clappingHands() }}
                @elseif ($type === "App\Notifications\TaskMentioned")
                    {{ Emoji::raisedHand() }}
                @endif
                {{
                    \App\User::find($data['user_id'])->firstname ?
                    \App\User::find($data['user_id'])->firstname . ' ' . \App\User::find($data['user_id'])->lastname : ''
                }}
            </span>
            @if ($type === "App\Notifications\TaskPraised")
                praised your task
                <div class="font-weight-bold mt-2">
                    <a class="text-dark" href="{{ route('task', ['id' => $data['task_id']]) }}">
                        {{ $data['task'] }}
                    </a>
                </div>
            @elseif ($type === "App\Notifications\TaskMentioned")
                mentioned you in a task
                <div class="font-weight-bold mt-2">
                    <a class="text-dark" href="{{ route('task', ['id' => $data['task_id']]) }}">
                        {{ $data['task'] }}
                    </a>
                </div>
            @elseif ($type === "App\Notifications\TaskCommentPraised")
                praised your task comment
                <div class="font-weight-bold mt-2">
                    <a class="text-dark" href="{{ route('task', ['id' => $data['task_id']]) }}">
                        {{ $data['comment'] }}
                    </a>
                </div>
            @elseif ($type === "App\Notifications\QuestionPraised")
                praised your question
                <div class="font-weight-bold mt-2">
                    <a class="text-dark" href="{{ route('question.question', ['id' => $data['question_id']]) }}">
                        {{ $data['question'] }}
                    </a>
                </div>
            @elseif ($type === "App\Notifications\AnswerPraised")
                praised your answer
                <div class="font-weight-bold mt-2">
                    <a class="text-dark" href="{{ route('question.question', ['id' => $data['question_id']]) }}">
                        {{ Str::words($data['answer'], '15') }}
                    </a>
                </div>
            @endif
            <div class="small mt-2 text-secondary">
                {{ Carbon::createFromTimeStamp(strtotime($created_at))->diffForHumans() }}
            </div>
        </div>
    </div>
</div>
