<div class="col-sm">
    <div class="card mb-4">
        <div class="card-header">
            Creator
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <img class="rounded-circle avatar-30 mt-1 ml-2" src="{{ $product->user->avatar }}" height="50" width="50" />
                <a href="{{ route('user.done', ['username' => $product->user->username]) }}" class="ml-2 mr-2 align-text-top font-weight-bold text-dark">
                    {{ $product->user->firstname ? $product->user->firstname . ' ' . $product->user->lastname : $product->user->username }}
                </a>
            </li>
        </ul>
    </div>
</div>
