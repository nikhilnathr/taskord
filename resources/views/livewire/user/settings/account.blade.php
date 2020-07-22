<div class="col-md-8">
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show mb-3">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{ session('message') }}
        </div>
    @endif
    <div class="card mb-4">
        <div class="card-header">
            Account
        </div>
        <div class="card-body">
            <form wire:submit.prevent="updateAccount">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" value="{{ $user->username }}" wire:model="username">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" value="{{ $user->email }}" wire:model="email">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
