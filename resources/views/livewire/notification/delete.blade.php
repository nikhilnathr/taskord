<div>
    <button class="btn btn-danger mb-3" wire:click="markAsRead">
        Delete all Notification
        <span wire:target="deleteAll" wire:loading class="spinner-border spinner-border-sm ml-2" role="status"></span>
    </button>
</div>
