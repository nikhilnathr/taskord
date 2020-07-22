<div>
    @if (Auth::user()->hasSubscribed($product))
    <button wire:click="subscribeProduct" wire:loading.attr="disabled" class="btn btn-sm btn-danger mt-2 mb-2">
        <i class="fa fa-minus mr-1"></i>
        Unsubscribe
    </button>
    @else
    <button wire:click="subscribeProduct" wire:loading.attr="disabled" class="btn btn-sm btn-primary mt-2 mb-2">
        <i class="fa fa-plus mr-1"></i>
        Subscribe
    </button>
    @endif
    @if (session()->has('message'))
        <span class="ml-2 text-danger font-weight-bold">{{ session('message') }}</span>
    @endif
</div>
