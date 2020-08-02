@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            @if (Auth::user()->unreadNotifications->count() !== 0)
            @livewire('notification.mark-as-read')
            @endif
            @livewire('notification.notifications', [
                'page' => 1,
                'perPage' => 10
            ])
        </div>
    </div>
</div>
@endsection
