<div>
    @if (count($questions) === 0)
    <div class="card-body text-center">
        <i class="fa fa-3x fa-box-open mb-3 text-primary"></i>
        <div class="h5">
            No products made!
        </div>
    </div>
    @endif
    @foreach ($questions as $question)
        @livewire('questions.single-question', [
            'type' => 'question.newest',
            'question' => $question,
        ], key($question->id))
    @endforeach
    
    {{ $questions->links() }}
</div>
