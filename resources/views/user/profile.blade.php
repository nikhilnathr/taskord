<div class="card">
    <div class="row">
        <div class="col-md-7">
            <div class="card-body d-flex align-items-center">
                <img class="rounded-circle avatar-120" src="{{ $user->avatar }}" />
                <div class="ml-4">
                    <div class="h5 mb-0">
                        {{ $user->firstname ? $user->firstname . ' ' . $user->lastname : '' }}
                        @if (Auth::check() && $user->isFollowing(Auth::user()))
                            <span class="ml-2 badge bg-light text-black-50">Follows you</span>
                        @endif
                        @if (Auth::check() && Auth::user()->isStaff && $user->isFlagged)
                            <span class="ml-2 badge bg-danger">Flagged</span>
                        @endif
                    </div>
                    <div class="text-black-50 mb-2">
                        {{ "@" . $user->username }}
                    </div>
                    @if (Auth::check() && Auth::user()->id !== $user->id && !$user->isFlagged)
                        @livewire('user.follow', [
                            'user' => $user
                        ])
                    @endif
                    <span class="small">
                        <span class="font-weight-bold">{{ $user->followings()->count() }}</span>
                        {{ $user->followings()->count() <= 1 ? "Following" : "Followings" }}
                        <span class="font-weight-bold ml-2">{{ $user->followers()->count() }}</span>
                        {{ $user->followers()->count() <= 1 ? "Follower" : "Followers" }}
                        <span class="font-weight-bold ml-2">{{ $user->task_praise->count() }}</span>
                        {{ $user->task_praise->count() <= 1 ? "Praise" : "Praises" }}
                    </span>
                    @if ($user->bio)
                    <div class="mt-3">
                        {{ $user->bio }}
                    </div>
                    @endif
                    <div class="small mt-3">
                        <span>{{Emoji::calendar()}} Joined {{ Carbon::parse($user->created_at)->format("F Y") }}</span>
                        @if ($user->location)
                        <span class="ml-3">{{Emoji::roundPushpin()}} {{ $user->location }}</span>
                        @endif
                        @if ($user->company)
                        <span class="ml-3">{{Emoji::briefcase()}} {{ $user->company }}</span>
                        @if ($user->isStaff)
                        <span class="badge rounded-pill bg-primary ml-1">Staff</span>
                        @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card-body">
                <div class="h5">Highlights</div>
                <div class="mt-3">
                    <div>
                        <span class="font-weight-bold">{{Emoji::fire()}} {{ $user->getPoints(true) }}</span>
                        {{ $user->getPoints(true) < 2 ? 'Reputation' : 'Reputations' }}
                    </div>
                    @if (Auth::check() && Auth::user()->id === $user->id)
                    <div class="mt-2">
                        <span>{{Emoji::blossom()}} You are a</span>
                        <span class="font-weight-bold">{{ count($user->badges) === 0 ? 'Beginner' : $user->badges->last()->name }}</span>
                    </div>
                    @else
                    <div class="mt-2">
                        <span>{{Emoji::blossom()}} {{ $user->username }} is a</span>
                        <span class="font-weight-bold">{{ count($user->badges) === 0 ? 'Beginner' : $user->badges->last()->name }}</span>
                    </div>
                    @endif
                    @if ($user->isBeta)
                    <div class="mt-2">
                        <span class="font-weight-bold">{{Emoji::testTube()}} Beta Program Member</span>
                    </div>
                    @endif
                    @if ($user->isDeveloper)
                    <div class="mt-2">
                        <span class="font-weight-bold">{{Emoji::checkBoxWithCheck()}} Taskord Code Contributor</span>
                    </div>
                    @endif
                </div>
            </div>  
        </div>
    </div>
    <div class="card-footer text-muted">
        <a class="text-dark font-weight-bold mr-4" href="{{ route('user.done', ['username' => $user->username]) }}">
            <span class="@if (Route::currentRouteName() === 'user.done') text-primary @endif">Done</span>
            <span class="small font-weight-normal text-black-50">{{ $done_count }}</span>
        </a>
        <a class="text-dark font-weight-bold mr-4" href="{{ route('user.pending', ['username' => $user->username]) }}">
            <span class="@if (Route::currentRouteName() === 'user.pending') text-primary @endif">Pending</span>
            <span class="small font-weight-normal text-black-50">{{ $pending_count }}</span>
        </a>
        <a class="text-dark font-weight-bold mr-4" href="{{ route('user.products', ['username' => $user->username]) }}">
            <span class="@if (Route::currentRouteName() === 'user.products') text-primary @endif">Products</span>
            <span class="small font-weight-normal text-black-50">{{ $product_count }}</span>
        </a>
        <a class="text-dark font-weight-bold mr-4" href="">
            Questions <span class="small font-weight-normal text-black-50">1000</span>
        </a>
        <a class="text-dark font-weight-bold mr-4" href="">
            Comments <span class="small font-weight-normal text-black-50">1000</span>
        </a>
        <a class="text-dark font-weight-bold mr-4" href="">
            Stats
        </a>
    </div>
</div>
