<div class="col-md-8">
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show mb-3">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <i class="fa fa-check mr-1"></i>
            {{ session('success') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show mb-3">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <i class="fa fa-times mr-1"></i>
            {{ session('error') }}
        </div>
    @endif
    <div class="card mb-4">
        <div class="card-header">
            Change Password
        </div>
        <div class="card-body">
            <form wire:submit.prevent="updatePassword">
                <div class="mb-3">
                    <label class="form-label">Existing Password</label>
                    <input type="password" class="form-control @error('currentPassword') is-invalid @enderror" wire:model.lazy="currentPassword">
                    @error('currentPassword')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">New Password</label>
                    <input type="password" class="form-control @error('newPassword') is-invalid @enderror" wire:model="newPassword">
                    @error('newPassword')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" class="form-control @error('confirmPassword') is-invalid @enderror" wire:model="confirmPassword">
                    @error('confirmPassword')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
