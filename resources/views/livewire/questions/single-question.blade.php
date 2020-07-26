<div class="card mb-2">
    <div class="card-body d-flex align-items-center">
        <img class="avatar-40 rounded-circle" src="{{ $question->user->avatar }}" />
        <span class="ml-2">
            <a href="{{ route('user.done', ['username' => $question->user->username]) }}" class="font-weight-bold text-dark">
                {{ $question->user->firstname ? $question->user->firstname . ' ' . $question->user->lastname : '' }}
                @if ($question->user->isPatron)
                    <a class="ml-1 small" href="{{ route('patron') }}" data-toggle="tooltip" data-placement="right" title="Patron">
                        {{ Emoji::handshake() }}
                    </a>
                @endif
            </a>
            <div class="small">{{ "@" . $question->user->username }}</div>
        </span>
        <span class="align-text-top small float-right ml-auto">
            <a class="text-black-50" href="{{ route('question', ['id' => $question->id]) }}">
                {{ Carbon::parse($question->created_at)->diffForHumans() }}
            </a>
        </span>
    </div>
    <div class="card-body pt-1">
        <a href="{{ route('question', ['id' => $question->id]) }}" class="h5 align-text-top font-weight-bold text-dark">
            {{ Str::words($question->title, '10') }}
        </a>
        <div class="mt-2">{{ Str::words($question->body, '30') }}</div>
        <div class="mt-3">
            @auth
            @if (true)
                <button type="button" class="btn btn-task btn-success text-white mr-1" wire:click="togglePraise" wire:loading.attr="disabled">
                    {{ Emoji::clappingHands() }}
                    <span class="small text-dark font-weight-bold">
                        10
                    </span>
                </button>
            @else
                <button type="button" class="btn btn-task btn-outline-success mr-1" wire:click="togglePraise" wire:loading.attr="disabled">
                    {{ Emoji::clappingHands() }}
                    <span class="small text-dark font-weight-bold">
                        10
                    </span>
                </button>
            @endif
            @endauth
            @guest
                <a href="/login" class="btn btn-task btn-outline-success mr-1">
                    {{ Emoji::clappingHands() }}
                    <span class="small text-dark font-weight-bold">
                        10
                    </span>
                </a>
            @endguest
            <a href="#" class="avatar-stack text-dark">
                @foreach ($question->answer->take(5) as $answer)
                <img class="rounded-circle avatar avatar-30" src="{{ $answer->user->avatar }}" />
                @endforeach
                @if ($question->answer->count() >= 5)
                <span class="ml-3 pl-1 align-middle font-weight-bold small">
                    +{{ $question->answer->count() - 5 }} more
                </span>
                @endif
            </a>
        </div>
    </div>
</div>
