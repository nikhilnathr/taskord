<li class="nav-item mr-2">
    <a class="nav-link text-white" href="{{ route('notifications') }}">
        {{ Emoji::bell() }}
        <span wire:poll class="notification-count bg-danger font-weight-bold rounded">
            {{ Auth::user()->notifications->count() }}
        </span>
    </a>
</li>
