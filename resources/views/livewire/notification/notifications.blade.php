<div>
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
