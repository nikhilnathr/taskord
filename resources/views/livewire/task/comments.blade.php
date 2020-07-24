<div class="card mt-4" wire:poll.5s>
    <ul class="list-group list-group-flush">
        @foreach ($comments as $comment)
            @livewire('task.single-comment', [
                'comment' => $comment
            ], key($comment->id))
        @endforeach
    </ul>
</div>
