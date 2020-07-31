<div>
    @foreach (Auth::user()->notifications as $notification)
        @livewire('notification.single-notification', [
            'type' => $notification->type,
            'data' => $notification->data
        ], key($notification->id))
    @endforeach
</div>
