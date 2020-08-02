@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            @if (Auth::user()->notifications->count() !== 0)
            @livewire('notification.delete')
            @endif
            @livewire('notification.all', [
                'type' => 'all',
                'page' => 1,
                'perPage' => 10
            ])
        </div>
    </div>
</div>
@endsection
