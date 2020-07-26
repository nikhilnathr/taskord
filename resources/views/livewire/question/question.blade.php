<div>
    <div class="card mb-2">
        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show m-3">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ session('error') }}
            </div>
        @endif
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
                <span class="text-black-50">
                    {{ Carbon::parse($question->created_at)->diffForHumans() }}
                </span>
            </span>
        </div>
        <div class="card-body pt-1">
            <span class="h5 align-text-top font-weight-bold text-dark">
                {{ $question->title }}
            </span>
            <div class="mt-2">@markdown($question->body)</div>
            <div class="mt-3">
                @auth
                @if (Auth::user()->question_praise->where('question_id', $question->id)->count() === 1)
                    <button type="button" class="btn btn-task btn-success text-white mr-1" wire:click="togglePraise" wire:loading.attr="disabled">
                        {{ Emoji::clappingHands() }}
                        <span class="small text-dark font-weight-bold">
                            {{ $question->question_praise->count() }}
                        </span>
                    </button>
                @else
                    <button type="button" class="btn btn-task btn-outline-success mr-1" wire:click="togglePraise" wire:loading.attr="disabled">
                        {{ Emoji::clappingHands() }}
                        <span class="small text-dark font-weight-bold">
                            {{ $question->question_praise->count() }}
                        </span>
                    </button>
                @endif
                @if (Auth::user()->id === $question->user->id)
                <a type="button" class="btn btn-task btn-outline-info text-white mr-1" href="{{ route('question.edit', ['id' => $question->id]) }}">
                    {{ Emoji::writingHand() }}
                    <span class="small text-dark font-weight-bold">
                        Edit
                    </span>
                </a>
                <button type="button" class="btn btn-task btn-outline-danger text-white mr-1" wire:click="deleteQuestion" wire:loading.attr="disabled">
                    {{ Emoji::wastebasket() }}
                </button>
                @endif
                @endauth
                @guest
                    <a href="/login" class="btn btn-task btn-outline-success mr-1">
                        {{ Emoji::clappingHands() }}
                        <span class="small text-dark font-weight-bold">
                            {{ $question->question_praise->count() }}
                        </span>
                    </a>
                @endguest
            </div>
        </div>
    </div>
</div>
