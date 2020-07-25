<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Taskord') }}</title>
    <link rel="icon" href="/images/logo.svg" sizes="any" type="image/svg+xml">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" data-turbolinks-track="true">
    @if(Auth::check() && Auth::user()->isPatron or Auth::check() && Auth::user()->isStaff)
    @if(Auth::user()->darkMode)
    <link href="{{ asset('css/darkmode.css') }}" rel="stylesheet" data-turbolinks-track="true">
    @endif
    @endif
    @livewireStyles
</head>
<body>
    <div id="app">
        {{ Debugbar::disable() }}
        @if (Auth::check() && Auth::user()->isStaff)
            @if (Auth::user()->staffShip)
            {{ Debugbar::enable() }}
            <div class="admin-bar">
                @livewire('admin.adminbar')
            </div>
            @endif
        @endif
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/images/logo.svg" height="35" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    @livewire('search')
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link text-white font-weight-bold" href="{{ route('products.newest') }}">
                                Products
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white font-weight-bold" href="{{ route('questions.newest') }}">
                                Questions
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link text-white font-weight-bold" href="#" data-toggle="dropdown">
                                More
                            </a>
                            <ul class="dropdown-menu shadow-sm border" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item text-dark" href="#">{{Emoji::wrappedGift()}} Deals</a></li>
                                <li><a class="dropdown-item text-dark" href="#">{{Emoji::clinkingBeerMugs()}} Meetups</a></li>
                                <li><a class="dropdown-item text-dark" href="#">{{Emoji::thinkingFace()}} Help</a></li>
                                <li><a class="dropdown-item text-dark" href="#">{{Emoji::hammerAndWrench()}} API</a></li>
                                <li><a class="dropdown-item text-dark" href="#">{{Emoji::barChart()}} Open</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        @guest
                            <li class="nav-item mr-3">
                                <a class="nav-link font-weight-bold" href="{{ route('login') }}">Login</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white btn btn-primary font-weight-bold" href="{{ route('register') }}">Register</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item mr-2">
                                <a class="nav-link text-white" href="#">
                                    {{Emoji::speechBalloon()}}
                                </a>
                            </li>
                            <li class="nav-item mr-2">
                                <div class="nav-link">
                                    <span class="badge rounded-pill bg-warning text-dark reputation">
                                        {{Emoji::fire()}} {{ Auth::user()->getPoints(true) }}
                                    </span>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" href="#" role="button" data-toggle="dropdown" v-pre>
                                    <img class="rounded-circle avatar-30 mt-1" src="{{ Auth::user()->avatar }}" />
                                </a>

                                <div class="dropdown-menu shadow-sm border dropdown-menu-right mt-2" aria-labelledby="navbarDropdown">
                                    <div class="dropdown-item">
                                        <div class="font-weight-bold">
                                            {{ Auth::user()->firstname ? Auth::user()->firstname . ' ' . Auth::user()->lastname : '' }}
                                        </div>
                                        <div class="small">
                                            {{ "@" . Auth::user()->username }}
                                        </div>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-dark" href="{{ route('user.done', ['username' => Auth::user()->username]) }}">
                                        {{Emoji::bustInSilhouette()}} Profile
                                    </a>
                                    <a class="dropdown-item text-dark" href="{{ route('user.pending', ['username' => Auth::user()->username]) }}">
                                        {{Emoji::hourglassNotDone()}} Pending Tasks
                                    </a>
                                    <a class="dropdown-item text-dark" href="{{ route('user.settings.profile') }}">
                                        {{Emoji::gear()}} Settings
                                    </a>
                                    <a class="dropdown-item text-dark" href="{{ route('patron') }}">
                                        {{Emoji::handshake()}} Patron
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    @if (Auth::user()->isStaff)
                                    <a class="dropdown-item text-dark" id="admin-bar-click" role="button">
                                        @if (Auth::user()->staffShip)
                                        {{Emoji::seeNoEvilMonkey()}} Hide Admin Bar
                                        @else
                                        {{Emoji::eyes()}} Show Admin Bar
                                        @endif
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    @endif
                                    @if (Auth::user()->isPatron)
                                    <a class="dropdown-item text-dark" id="dark-mode" role="button">
                                        @if (Auth::user()->darkMode)
                                        {{Emoji::sunWithFace()}} Light Mode
                                        @else
                                        {{Emoji::newMoonFace()}} Dark Mode
                                        @endif
                                    </a>
                                    @endif
                                    <a class="dropdown-item text-dark" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{Emoji::door()}} Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @if (Auth::check() && Auth::user()->isFlagged)
        <div class="alert alert-danger rounded-0" role="alert">
            <div class="font-weight-bold">Your account has been flagged.</div>
            <div class="mt-1">
                Because of that, your profile will be hidden from the public. If you believe this is a mistake, <a href="#">contact support</a> to have your account status reviewed.
            </div>
        </div>
        @endif

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/app.js') }}" defer data-turbolinks-track="true" data-turbolinks-eval=false></script>
    <script src="https://kit.fontawesome.com/4f46a7856f.js" crossorigin="anonymous"></script>
    @livewireScripts
</body>
</html>
