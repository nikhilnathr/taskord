<div class="card">
    <div class="row">
        <div class="col-md-7">
            <div class="card-body d-flex align-items-center">
                <img class="rounded-circle avatar-120" src="{{ $user->avatar }}" />
                <div class="ml-4">
                    <div class="h5">
                        {{ $user->firstname ? $user->firstname . ' ' . $user->lastname : '' }}
                        @if (Auth::check() && $user->isFollowing(Auth::user()))
                            <span class="ml-2 badge bg-light text-black-50">Follows you</span>
                        @endif
                        @if (Auth::check() && Auth::user()->isStaff && $user->isFlagged)
                            <span class="ml-2 badge bg-danger">Flagged</span>
                        @endif
                        <div class="small text-black-50 font-weight-normal">
                            {{ "@" . $user->username }}
                        </div>
                    </div>
                    @if (Auth::check() && Auth::user()->id !== $user->id && !$user->isFlagged)
                        @livewire('user.follow', [
                            'user' => $user
                        ])
                    @endif
                    <span class="small">
                        <span class="font-weight-bold">{{ $user->followings()->count() }}</span> Followings
                        <span class="font-weight-bold ml-2">{{ $user->followers()->count() }}</span> Followers
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
                        <span class="font-weight-bold">{{Emoji::blossom()}} You are a </span>
                        {{ count($user->badges) < 0 ? 'Beginner' : $user->badges->last()->name }}
                    </div>
                    
                    @endif
                    {{ count($user->badges)}}
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
