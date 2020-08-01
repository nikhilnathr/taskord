<div>
    @if ($notifications->count() === 0)
    <div class="card-body text-center mt-3">
        <i class="fa fa-4x fa-bell mb-3 text-primary"></i>
        <div class="h4">
            No new notifications!
        </div>
    </div>
    @else
    <button class="btn btn-primary mb-3" wire:click="markAsRead">
        Mark all as Read
        <span wire:target="markAsRead" wire:loading class="spinner-border spinner-border-sm ml-2" role="status"></span>
    </button>
    @endif
    @foreach ($notifications as $notification)
        @livewire('notification.single-notification', [
            'type' => $notification->type,
            'data' => $notification->data,
            'created_at' => $notification->created_at,
        ], key($notification->id))
    @endforeach
    @if ($notifications->hasMorePages())
        @livewire('notification.load-more', [
            'page' => $page,
            'perPage' => $perPage
        ])
    @endif
</div>
