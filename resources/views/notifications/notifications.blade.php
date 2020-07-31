@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            @livewire('notification.notifications')
        </div>
    </div>
</div>
@endsection
