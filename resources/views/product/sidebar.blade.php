<div class="col-sm">
    <div class="card mb-4">
        <div class="card-header">
            Creator
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item pt-2 pb-2">
                <a href="{{ route('user.done', ['username' => $product->user->username]) }}">
                    <img class="rounded-circle avatar-30" src="{{ $product->user->avatar }}" />
                </a>
                <a href="{{ route('user.done', ['username' => $product->user->username]) }}" class="ml-2 align-middle font-weight-bold text-dark">
                    {{ $product->user->firstname ? $product->user->firstname . ' ' . $product->user->lastname : $product->user->username }}
                </a>
            </li>
        </ul>
    </div>
</div>
