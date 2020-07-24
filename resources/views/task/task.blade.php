@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            @if (!$task->user->isFlagged)
                                @livewire('task.single-task', [
                                    'task' => $task
                                ], key($task->id))
                            @endif
                        </ul>
                    </div>
                    @livewire('task.comments', [
                        'task' => $task,
                        'page' => 1,
                        'perPage' => 10
                    ])
                </div>
                <div class="col-sm">
                    <div class="card mb-4">
                        <div class="card-header">
                            Created by
                        </div>
                        <div class="card-body d-flex align-items-center">
                            <img class="rounded-circle avatar-40 mt-1" src="{{ $task->user->avatar }}" />
                            <span class="ml-3">
                                <a href="{{ route('user.done', ['username' => $task->user->username]) }}" class="align-text-top text-dark">
                                    <span class="font-weight-bold">
                                        {{ $task->user->firstname ? $task->user->firstname . ' ' . $task->user->lastname : $task->user->username }}
                                    </span>
                                    <div>{{ $task->user->bio }}</div>
                                </a>
                            </span>
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
