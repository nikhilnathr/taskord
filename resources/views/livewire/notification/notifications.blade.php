<div>
    @foreach (Auth::user()->notifications as $notification)
        <li>{{ $notification }}</li>
    @endforeach
</div>
