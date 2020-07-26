@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <a class="mb-2 btn btn-{{ Route::currentRouteName() === 'products.newest' ? '' : 'outline-' }}primary mr-2" href="{{ route('products.newest') }}">
                            Newest
                        </a>
                        <a class="mb-2 btn btn-{{ Route::currentRouteName() === 'products.launched' ? '' : 'outline-' }}primary mr-2" href="{{ route('products.launched') }}">
                            Launched
                        </a>
                        <a class="mb-2 btn btn-success float-md-right text-white" href="{{ route('products.new') }}">
                            <i class="fa fa-plus"></i>
                            New Product
                        </a>
                    </div>
                    @livewire('products.products', [
                        'type' => 'products.launched',
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
