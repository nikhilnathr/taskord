@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container">
            @livewire('tasks.create-task')
            <div class="card">
                <div class="card-header">
                    Tasks
                </div>
                @livewire('tasks.tasks')
            </div>
        </div>
    </div>
</div>
@endsection
