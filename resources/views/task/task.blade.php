@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            @livewire('task.single-task', [
                                'task' => $task
                            ], key($task->id))
                        </ul>
                    </div>
                    @if (Auth::check() && !Auth::user()->isFlagged)
                        @livewire('task.create-comment', [
                            'task' => $task
                        ])
                    @endif
                    @guest
                        <a href="/login" class="btn btn-block btn-success mt-4 text-white font-weight-bold">
                            {{ Emoji::wavingHand() }} Login or Signup to comment
                        </a>
                    @endguest
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
                    @if ($task->product_id)
                    <div class="card mb-4">
                        <div class="card-header">
                            Product
                        </div>
                        <div class="card-body d-flex align-items-center">
                            <img class="rounded avatar-40 mt-1" src="{{ \App\Product::find($task->product_id)->avatar }}" />
                            <span class="ml-3">
                                <a href="{{ route('user.done', ['username' => $task->user->username]) }}" class="align-text-top text-dark">
                                    <span class="font-weight-bold">
                                        {{ \App\Product::find($task->product_id)->name }}
                                    </span>
                                    <div>{{ \App\Product::find($task->product_id)->description }}</div>
                                </a>
                            </span>
                        </div>
                    </div>
                    @endif
                    @if ($task->task_comments->count() > 0)
                    <div class="card mb-4">
                        <div class="card-header">
                            Users Involved
                        </div>
                        <div class="card-body align-items-center pb-2">
                            @foreach ($task->task_comments->groupBy('user_id') as $comment)
                                <a
                                    title="{{ $comment[0]->user->firstname ? $comment[0]->user->firstname . ' ' . $comment[0]->user->lastname : $comment[0]->user->username }}"
                                    href="{{ route('user.done', ['username' => $comment[0]->user->username]) }}"
                                    class="mr-1"
                                >
                                    <img class="rounded-circle avatar-30 mb-2" src="{{ $comment[0]->user->avatar }}" />
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
