@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container">
            @livewire('questions.create-question')
        </div>
    </div>
</div>
@endsection
