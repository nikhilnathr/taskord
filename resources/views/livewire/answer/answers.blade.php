<div>
    @foreach ($answers as $answer)
        @livewire('answer.single-answer', [
            'answer' => $answer
        ])
    @endforeach
</div>
