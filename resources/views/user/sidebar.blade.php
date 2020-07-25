<div class="col-sm">
    @if (Auth::check() && Auth::user()->isStaff && Auth::user()->staffShip)
        @livewire('user.moderator', [
            'user' => $user
        ])
    @endif
    @if ($user->website or $user->twitter or $user->twitch or $user->telegram or $user->github or $user->youtube)
    <div class="card mb-4">
        <div class="card-header">
            Social
        </div>
        <ul class="list-group list-group-flush">
            @if ($user->website)
            <li class="list-group-item">
                <a class="text-dark" href="{{ $user->website }}">
                    <i class="fa fa-link mr-1"></i>
                    {{ Helper::removeProtocol($user->website) }}
                </a>
            </li>
            @endif
            @if ($user->twitter)
            <li class="list-group-item">
                <a class="text-dark" href="https://twitter.com/{{ $user->twitter }}">
                    <i class="fa fa-twitter mr-1"></i>
                    {{ $user->twitter }}
                </a>
            </li>
            @endif
            @if ($user->twitch)
            <li class="list-group-item">
                <a class="text-dark" href="https://twitch.tv/{{ $user->twitch }}">
                    <i class="fa fa-twitch mr-1"></i>
                    {{ $user->twitch }}
                </a>
            </li>
            @endif
            @if ($user->telegram)
            <li class="list-group-item">
                <a class="text-dark" href="https://t.me/{{ $user->telegram }}">
                    <i class="fa fa-telegram mr-1"></i>
                    {{ $user->telegram }}
                </a>
            </li>
            @endif
            @if ($user->github)
            <li class="list-group-item">
                <a class="text-dark" href="https://github.com/{{ $user->github }}">
                    @if (Auth::user()->darkMode)
                    <i class="fa fa-github text-white mr-1"></i>
                    @else
                    <i class="fa fa-github mr-1"></i>
                    @endif
                    {{ $user->github }}
                </a>
            </li>
            @endif
            @if ($user->youtube)
            <li class="list-group-item">
                <a class="text-dark" href="https://youtube.com/{{ $user->youtube }}">
                    <i class="fa fa-youtube mr-1"></i>
                    {{ $user->youtube }}
                </a>
            </li>
            @endif
        </ul>
    </div>
    @endif
    <div class="card mb-4">
        <div class="card-header">
            Products
        </div>
        <ul class="list-group list-group-flush">
            @if (count($user->products) === 0)
            <div class="card-body text-center">
                <i class="fa fa-3x fa-box-open mb-3 text-primary"></i>
                <div class="h5">
                    No products made!
                </div>
            </div>
            @endif
            @foreach($user->products->take(5) as $product)
            <li class="list-group-item">
                <img class="rounded avatar-30 mt-1 ml-2" src="{{ $product->avatar }}" height="50" width="50" />
                <a href="{{ route('product.done', ['slug' => $product->slug]) }}" class="ml-2 mr-2 align-text-top font-weight-bold text-dark">
                    {{ $product->name }}
                </a>
            </li>
            @endforeach
        </ul>
        @if (count($user->products) > 5)
        <div class="card-footer">
            <a class="font-weight-bold" href="{{ route('user.products', ['username' => $user->username]) }}">More Products...</a>
        </div>
        @endif
    </div>
</div>
