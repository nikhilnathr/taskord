@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @if (session()->has('product_deleted'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <i class="fa fa-check mr-1"></i>
                            {{ session('product_deleted') }}
                        </div>
                    @endif
                    @include('products.nav')
                    @livewire('products.products', [
                        'type' => 'products.newest',
                        'page' => 1,
                        'perPage' => 1
                    ])
                </div>
                <div class="col-sm">
                    <div class="card mb-4">
                        <div class="card-header">
                            Your products
                        </div>
                        <ul class="list-group list-group-flush">
                            
                        </ul>
                    </div>
                    @include('components.footer')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
