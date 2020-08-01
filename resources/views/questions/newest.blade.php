@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <a class="mb-2 btn btn-{{ Route::currentRouteName() === 'questions.newest' ? '' : 'outline-' }}primary mr-2" href="{{ route('questions.newest') }}">
                            Newest
                        </a>
                        <a class="mb-2 btn btn-{{ Route::currentRouteName() === 'questions.unanswered' ? '' : 'outline-' }}primary mr-2" href="{{ route('questions.unanswered') }}">
                            Unanswered
                        </a>
                        <a class="mb-2 btn btn-{{ Route::currentRouteName() === 'questions.popular' ? '' : 'outline-' }}primary mr-2" href="{{ route('questions.popular') }}">
                            Popular
                        </a>
                        <a class="btn btn-success float-md-right mb-2 text-white" href="{{ route('questions.new') }}">
                            <i class="fa fa-plus"></i>
                            New Question
                        </a>
                    </div>
                    @if (session()->has('question_deleted'))
                        <div class="alert alert-success alert-dismissible fade show mt-2">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <i class="fa fa-check mr-1"></i>
                            {{ session('question_deleted') }}
                        </div>
                    @endif
                    @livewire('questions.questions', [
                        'type' => $type,
                        'page' => 1,
                        'perPage' => 10
                    ])
                </div>
                <div class="col-sm">
                    <div class="card mb-4">
                        <div class="card-header">
                            Card
                        </div>
                        <div class="card-body d-flex align-items-center">
                            
                        </div>
                    </div>
                    @include('components.footer')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
