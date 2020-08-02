<li wire:poll.5s class="nav-item mr-2">
    <a class="nav-link text-white" href="{{ route('notifications') }}">
        {{ Emoji::bell() }}
        @if (Auth::user()->notifications->count() !== 0)
        <span class="notification-count bg-danger font-weight-bold rounded">
            {{ Auth::user()->notifications->count() }}
        </span>
        @endif
    </a>
</li>
