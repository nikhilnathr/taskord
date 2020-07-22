<div>
    @if (Auth::user()->isFollowing($user))
    <button wire:click="followUser" wire:loading.attr="disabled" class="btn btn-sm btn-danger mt-2 mb-2">
        <i class="fa fa-user-minus mr-1"></i>
        Unfollow
    </button>
    @else
    <button wire:click="followUser" wire:loading.attr="disabled" class="btn btn-sm btn-primary mt-2 mb-2">
        <i class="fa fa-user-plus mr-1"></i>
        Follow
    </button>
    @endif
    @if (session()->has('message'))
        <span class="ml-2 text-danger font-weight-bold">{{ session('message') }}</span>
    @endif
</div>
