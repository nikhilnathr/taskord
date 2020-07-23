@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @guest
                    <div class="p-5 rounded mb-4 text-white" style="
                        background-image: url(https://www.article19.org/wp-content/uploads/2020/03/corona-virus-1-1500x1000.jpg);
                        background-size: contain;
                        text-shadow: 2px 2px #545454;
                    ">
                        <h1>Welcome to Taskord</h1>
                        <p class="lead">
                            Taskord helps you stay social with your todolist, so you can get things done together.
                        </p>
                        <a class="btn btn-lg btn-primary" href="/register" role="button">
                            Signup now
                        </a>
                    </div>
                    @endguest
                    <div class="card mb-4">
                        <div class="card-header">
                            Recent questions
                        </div>
                        <div class="card-body">
                            WIP
                        </div>
                    </div>
                    @if (count($launched_today) > 0)
                    <div class="card mb-4">
                        <div class="card-header">
                            🚀 Launched Today
                        </div>
                        <ul class="list-group list-group-flush">
                            @foreach($launched_today->take(5) as $product)
                            <li class="list-group-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded avatar-50 mt-1 ml-2" src="{{ $product->avatar }}" height="50" width="50" />
                                    <span class="ml-3">
                                        <a href="{{ route('product.done', ['slug' => $product->slug]) }}" class="mr-2 h5 align-text-top font-weight-bold text-dark">
                                            {{ $product->name }}
                                        </a>
                                        <div>{{ $product->description }}</div>
                                    </span>
                                    <a class="ml-auto" href="{{ route('user.done', ['username' => $product->user->username]) }}">
                                        <img class="rounded-circle float-right avatar-30 mt-1 ml-2" src="{{ $product->user->avatar }}" height="50" width="50" />
                                    </a>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        @if (count($launched_today) > 5)
                        <div class="card-footer">
                            <a class="font-weight-bold" href="{{ route('products.newest') }}">More Products...</a>
                        </div>
                        @endif
                    </div>
                    @endif
                    @auth
                        @if(!Auth::user()->isFlagged)
                        @livewire('create-task')
                        @endif
                    @endauth
                    @livewire('home.tasks', [
                        'page' => 1,
                        'perPage' => 2
                    ])
                </div>
                <div class="col-sm">
                    @auth
                        @livewire('home.onboarding')
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <div class="h5 pt-2">
                                    <img class="rounded-circle avatar-30" src="{{ Auth::user()->avatar }}" />
                                    <span class="align-middle">
                                        <span class="ml-2">Hi</span>
                                        <span class="font-weight-bold">{{ Auth::user()->firstname ? Auth::user()->firstname . ' ' . Auth::user()->lastname : Auth::user()->username }}!</span>
                                    </span>
                                </div>
                            </div>
                            <div class="card-body">
                                Soon
                            </div>
                        </div>
                    @endauth
                    <div class="card mb-4">
                        <div class="card-header">
                            🙌 Recently Joined
                        </div>
                        <ul class="list-group list-group-flush">
                            @foreach($recently_joined as $user)
                            <li class="d-flex list-group-item align-items-center">
                                <img class="rounded-circle avatar-40 mt-1" src="{{ $user->avatar }}" />
                                <span class="ml-3">
                                    <a href="{{ route('user.done', ['username' => $user->username]) }}" class="align-text-top text-dark">
                                        <span class="font-weight-bold">
                                            {{ $user->firstname ? $user->firstname . ' ' . $user->lastname : $user->username }}
                                        </span>
                                        <div>{{ $user->bio }}</div>
                                    </a>
                                </span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            ✨ New Products
                        </div>
                        <ul class="list-group list-group-flush">
                            @foreach($products as $product)
                            <li class="list-group-item">
                                <img class="rounded avatar-30 mt-1 ml-2" src="{{ $product->avatar }}" height="50" width="50" />
                                <a href="{{ route('product.done', ['slug' => $product->slug]) }}" class="ml-2 mr-2 align-text-top font-weight-bold text-dark">
                                    {{ $product->name }}
                                </a>
                                <a href="{{ route('user.done', ['username' => $product->user->username]) }}">
                                    <img class="rounded-circle float-right avatar-30 mt-1 ml-2" src="{{ $product->user->avatar }}" height="50" width="50" />
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        <div class="card-footer">
                            <a class="font-weight-bold" href="{{ route('products.newest') }}">More Products...</a>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            🥇 Top Reputations
                        </div>
                        <ul class="list-group list-group-flush">
                            @foreach($reputations as $user)
                            <li class="list-group-item">
                                <span class="h6 text-black-50" style="vertical-align:sub">
                                    @if ($loop->index === 0)
                                    <span class="font-weight-bold" style="color:green">
                                    @elseif ($loop->index === 1)
                                    <span class="font-weight-bold" style="color:darkmagenta">
                                    @elseif ($loop->index === 2)
                                    <span class="font-weight-bold" style="color:red">
                                    @else
                                    <span>
                                    @endif
                                        #{{ $loop->index + 1 }}
                                    </span>
                                </span>
                                <img class="rounded-circle avatar-30 mt-1 ml-2" src="{{ $user->avatar }}" height="50" width="50" />
                                <a href="{{ route('user.done', ['username' => $user->username]) }}" class="ml-2 mr-2 align-text-top font-weight-bold text-dark">
                                    {{ $user->firstname ? $user->firstname . ' ' . $user->lastname : '' }}
                                </a>
                                <span class="badge rounded-pill bg-warning text-dark align-middle reputation">
                                    {{Emoji::fire()}} {{ $user->getPoints(true) }}
                                </span>
                            </li>
                            @endforeach
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
