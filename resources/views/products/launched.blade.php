@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-4 text-center">
                        <a class="btn btn-{{ Route::currentRouteName() === 'products.newest' ? '' : 'outline-' }}primary mr-2" href="{{ route('products.newest') }}">
                            Newest
                        </a>
                        <a class="btn btn-outline-primary" href="{{ route('products.launched') }}">
                            Launched
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
