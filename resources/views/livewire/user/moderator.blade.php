<div class="card border-warning mb-4">
    <div class="card-header font-weight-bold">
        Moderator
    </div>
    <div class="card-body">
        <span>
            <span class="font-weight-bold">User ID:</span> {{ $user->id }}
        </span>
        <div class="mb-2 mt-3">
            <input wire:click="enrollBeta" class="form-check-input" type="checkbox" {{ $user->isBeta ? 'checked' : '' }}>
            <span class="ml-1">Enroll to Beta</span>
            <span wire:loading wire:target="enrollBeta" class="small ml-2 text-success font-weight-bold">Enrolling...</span>
        </div>
        <div class="mb-2">
            <input wire:click="enrollStaff" class="form-check-input" type="checkbox" {{ $user->isStaff ? 'checked' : '' }}>
            <span class="ml-1">Enroll to Staff</span>
            <span wire:loading wire:target="enrollStaff" class="small ml-2 text-success font-weight-bold">Enrolling...</span>
        </div>
        <div class="mb-2">
            <input wire:click="enrollPatron" class="form-check-input" type="checkbox" {{ $user->isPatron ? 'checked' : '' }}>
            <span class="ml-1">Enroll to Patron</span>
            <span wire:loading wire:target="enrollPatron" class="small ml-2 text-success font-weight-bold">Enrolling...</span>
        </div>
        <div class="mb-2">
            <input wire:click="enrollDarkMode" class="form-check-input" type="checkbox" {{ $user->darkMode ? 'checked' : '' }}>
            <span class="ml-1">Enable Dark Mode</span>
            <span wire:loading wire:target="enrollDarkMode" class="small ml-2 text-success font-weight-bold">Enrolling...</span>
        </div>
        <div>
            <input wire:click="enrollDeveloper" class="form-check-input" type="checkbox" {{ $user->isDeveloper ? 'checked' : '' }}>
            <span class="ml-1">Enroll to Contributor</span>
            <span wire:loading wire:target="enrollDeveloper" class="small ml-2 text-success font-weight-bold">Enrolling...</span>
        </div>
        @if (!$user->isStaff)
        <div class="mt-2">
            <input wire:click="flagUser" class="form-check-input" type="checkbox" {{ $user->isFlagged ? 'checked' : '' }}>
            <span class="ml-1 text-danger font-weight-bold">Flag this user</span>
            <span wire:loading wire:target="flagUser" class="small ml-2 text-danger font-weight-bold">Flagging...</span>
        </div>
        <div class="mt-3">
            <button wire:click="deleteUser" class="btn btn-sm btn-danger">
                <i class="fa fa-trash mr-1"></i>
                Delete this user
            </button>
            <span wire:loading wire:target="deleteUser" class="small ml-2 text-danger font-weight-bold">Deleting...</span>
        </div>
        @endif
    </div>
</div>
