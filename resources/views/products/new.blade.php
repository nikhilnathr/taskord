@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container">
            @livewire('products.new-product')
        </div>
    </div>
</div>
@endsection
