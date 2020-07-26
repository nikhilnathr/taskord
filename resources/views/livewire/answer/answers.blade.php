<div>
    @foreach ($answers as $answer)
        @livewire('answer.single-answer', [
            'answer' => $answer
        ])
    @endforeach
    @if ($answers->hasMorePages())
        @livewire('answer.load-more', [
            'question' => $answer->question,
            'page' => $page,
            'perPage' => $perPage
        ])
    @endif
</div>
