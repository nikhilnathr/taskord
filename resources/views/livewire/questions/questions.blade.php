<div>
    @foreach ($questions as $question)
        @livewire('questions.single-question', [
            'question' => $question,
        ])
    @endforeach
    @if ($questions->hasMorePages())
        @livewire('questions.load-more', [
            'type' => $type,
            'page' => $page,
            'perPage' => $perPage
        ])
    @endif
</div>
