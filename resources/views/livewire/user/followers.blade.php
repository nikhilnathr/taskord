<div>
    @foreach($user->followers as $user)
    <div class="card mb-3">
        <div class="card-body d-flex list-group-item align-items-center">
        <img class="rounded-circle avatar-40 mt-1" src="{{ $user->avatar }}" />
            <span class="ml-3">
                <a href="{{ route('user.done', ['username' => $user->username]) }}" class="align-text-top text-dark">
                    <span class="font-weight-bold">
                        {{ $user->firstname ? $user->firstname . ' ' . $user->lastname : $user->username }}
                    </span>
                    <div class="mb-2">{{ $user->bio }}</div>
                </a>
                @if (Auth::check() && Auth::user()->id !== $user->id && !$user->isFlagged)
                    @livewire('user.follow', [
                        'user' => $user
                    ])
                @endif
            </span>
        </div>
    </div>
    @endforeach
</div>
