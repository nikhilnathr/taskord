<div>
    @foreach (Auth::user()->notifications as $notification)
        @livewire('notification.single-notification', [
            'type' => $notification->type,
            'data' => $notification->data,
            'created_at' => $notification->created_at,
        ], key($notification->id))
    @endforeach
</div>
