@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-4">
                        @livewire('question.question', [
                            'question' => $question,
                        ])
                    </div>
                    @livewire('answer.answers', [
                        'question' => $question,
                        'page' => 1,
                        'perPage' => 10
                    ])
                </div>
                <div class="col-sm">
                    <div class="card mb-4">
                        <div class="card-header">
                            Asked by
                        </div>
                        <div class="card-body d-flex align-items-center">
                            
                        </div>
                    </div>
                    <div class="text-black-50">
                        <span>
                            © Taskord
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
