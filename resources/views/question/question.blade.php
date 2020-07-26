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
                            <img class="rounded-circle avatar-40 mt-1" src="{{ $question->user->avatar }}" />
                            <span class="ml-3">
                                <a href="{{ route('user.done', ['username' => $question->user->username]) }}" class="align-text-top text-dark">
                                    <span class="font-weight-bold">
                                        {{ $question->user->firstname ? $question->user->firstname . ' ' . $question->user->lastname : $question->user->username }}
                                    </span>
                                    <div>{{ $question->user->bio }}</div>
                                </a>
                            </span>
                        </div>
                    </div>
                    @if ($question->answer->count() > 0)
                    <div class="card mb-4">
                        <div class="card-header">
                            Users Involved
                        </div>
                        <div class="card-body align-items-center">
                            @foreach ($question->answer as $answer)
                            <a
                                title="{{ $answer->user->firstname ? $answer->user->firstname . ' ' . $answer->user->lastname : $answer->user->username }}"
                                href="{{ route('user.done', ['username' => $answer->user->username]) }}"
                                class="mr-1"
                            >
                                <img class="rounded-circle avatar-30 mb-2" src="{{ $answer->user->avatar }}" />
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif
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
