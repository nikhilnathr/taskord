<div class="col-md-8">
    <div class="card mb-4">
        <div class="card-header">
            Account
        </div>
        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show mb-3">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{ session('success') }}
                </div>
            @endif
            @if (session()->has('warning'))
                <div class="alert alert-warning alert-dismissible fade show mb-3">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{ session('warning') }}
                </div>
            @endif
            <form wire:submit.prevent="updateAccount">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" value="{{ $user->username }}" wire:model="username">
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}" wire:model="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
            <div class="mt-3">
                <input wire:click="enrollBeta" id="enrollBeta" class="form-check-input" type="checkbox" {{ $user->isBeta ? 'checked' : '' }}>
                <label for="enrollBeta" class="ml-1">Enroll to Beta</label>
                <span wire:loading wire:target="enrollBeta" class="small ml-2 text-success font-weight-bold">Enrolling...</span>
            </div>
        </div>
    </div>
</div>
