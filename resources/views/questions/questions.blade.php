@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-4">
                        <a class="btn btn-outline-primary mr-2" href="#">
                            Newest
                        </a>
                        <a class="btn btn-outline-primary mr-2" href="#">
                            Unanswered
                        </a>
                        <a class="btn btn-outline-primary mr-2" href="#">
                            Popular
                        </a>
                        <a class="btn btn-success mr-2 float-right text-white" href="#">
                            <i class="fa fa-plus"></i>
                            New Question
                        </a>
                    </div>
                    @livewire('questions.questions')
                </div>
                <div class="col-sm">
                    <div class="card mb-4">
                        <div class="card-header">
                            Card
                        </div>
                        <div class="card-body d-flex align-items-center">
                            
                        </div>
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
