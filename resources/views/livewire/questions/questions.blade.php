<div>
    @foreach($questions as $question)
        <div class="card mb-2">
            <div class="card-body d-flex align-items-center">
                <img class="avatar-40 rounded-circle" src="{{ $question->user->avatar }}" />
                <span class="ml-2">
                    <a href="{{ route('user.done', ['username' => $question->user->username]) }}" class="font-weight-bold text-dark">
                        {{ $question->user->firstname ? $question->user->firstname . ' ' . $question->user->lastname : '' }}
                        @if ($question->user->isPatron)
                            <a class="ml-1 small" href="{{ route('patron') }}" data-toggle="tooltip" data-placement="right" title="Patron">
                                {{Emoji::handshake()}}
                            </a>
                        @endif
                    </a>
                    <div class="small">{{ "@" . $question->user->username }}</div>
                </span>
                <span class="align-text-top small float-right ml-auto">
                    <a class="text-black-50" href="">
                        {{ Carbon::parse($question->created_at)->diffForHumans() }}
                    </a>
                </span>
            </div>
            <div class="card-body pt-1">
                <a href="" class="h5 align-text-top font-weight-bold text-dark">
                    {{ $question->title }}
                </a>
                <div class="mt-2">{{ Str::words($question->body, '30') }}</div>
                <div class="mt-3">
                    @auth
                    @if (true)
                        <button type="button" class="btn btn-task btn-success text-white mr-1" wire:click="togglePraise" wire:loading.attr="disabled">
                            {{Emoji::clappingHands()}}
                            <span class="small text-dark font-weight-bold">
                                10
                            </span>
                        </button>
                    @else
                        <button type="button" class="btn btn-task btn-outline-success mr-1" wire:click="togglePraise" wire:loading.attr="disabled">
                            {{Emoji::clappingHands()}}
                            <span class="small text-dark font-weight-bold">
                                10
                            </span>
                        </button>
                    @endif
                    @endauth
                    @guest
                        <a href="/login" class="btn btn-task btn-outline-success mr-1">
                            {{Emoji::clappingHands()}}
                            <span class="small text-dark font-weight-bold">
                                10
                            </span>
                        </a>
                    @endguest
                    @auth
                        <a href="" class="btn btn-task btn-outline-primary mr-1">
                            {{Emoji::speechBalloon()}}
                            <span class="small text-dark font-weight-bold">
                                {{ $question->answer->count() }}
                            </span>
                        </a>
                    @endauth
                    @guest
                        <a href="/login" class="btn btn-task btn-outline-primary mr-1">
                            {{Emoji::speechBalloon()}}
                            <span class="small text-black-50 font-weight-bold">
                                {{ $question->answer->count() }}
                            </span>
                        </a>
                    @endguest
                </div>
            </div>
        </div>
    @endforeach
    @if($questions->hasMorePages())
        @livewire('questions.load-more', [
            'type' => $type,
            'page' => $page,
            'perPage' => $perPage
        ])
    @endif
</div>
