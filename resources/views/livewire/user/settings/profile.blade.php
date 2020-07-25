<div class="col-md-8">
    <div class="card mb-4">
        <div class="card-header">
            Profile
        </div>
        <div class="card-body">
            @if (session()->has('profile'))
                <div class="alert alert-success alert-dismissible fade show mb-3">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{ session('profile') }}
                </div>
            @endif
            <form wire:submit.prevent="updateProfile">
                <div class="mb-3">
                    <label class="form-label">Firstname</label>
                    <input type="text" class="form-control @error('firstname') is-invalid @enderror" value="{{ $user->firstname }}" wire:model="firstname">
                    @error('firstname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Lastname</label>
                    <input type="text" class="form-control @error('lastname') is-invalid @enderror" value="{{ $user->lastname }}" wire:model="lastname">
                    @error('lastname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Bio</label>
                    <textarea class="form-control @error('bio') is-invalid @enderror"rows="3" wire:model="bio">{{ $user->bio }}</textarea>
                    @error('bio')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Location</label>
                    <input type="text" class="form-control @error('location') is-invalid @enderror" value="{{ $user->location }}" wire:model="location">
                    @error('location')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Company</label>
                    <input type="text" class="form-control @error('company') is-invalid @enderror" value="{{ $user->company }}" wire:model="company">
                    @error('company')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
    
    <div class="card mb-4">
        <div class="card-body">
            @if (session()->has('showfollowing'))
                <div class="alert alert-success alert-dismissible fade show mb-3">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{ session('showfollowing') }}
                </div>
            @endif
            <input wire:click="onlyFollowingsTasks" class="form-check-input" type="checkbox" {{ $user->onlyFollowingsTasks ? 'checked' : '' }}>
            <span class="ml-1">Show only following user's tasks on homepage</span>
            <span wire:loading wire:target="onlyFollowingsTasks" class="small ml-2 text-success font-weight-bold">Updating...</span>
        </div>
    </div>
    
    <div class="card mb-4">
        <div class="card-header">
            Social
        </div>
        <div class="card-body">
            @if (session()->has('social'))
                <div class="alert alert-success alert-dismissible fade show mb-3">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{ session('social') }}
                </div>
            @endif
            <form wire:target="updateSocial" wire:submit.prevent="updateSocial">
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class="fa fa-link"></i>
                    </span>
                    <input type="text" class="form-control" placeholder="Website" value="{{ $user->website }}" wire:model.lazy="website">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class="fa fa-twitter"></i>
                    </span>
                    <input type="text" class="form-control" placeholder="Twitter" value="{{ $user->twitter }}" wire:model.lazy="twitter">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class="fa fa-twitch"></i>
                    </span>
                    <input type="text" class="form-control" placeholder="Twitch" value="{{ $user->twitch }}" wire:model.lazy="twitch">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class="fa fa-telegram"></i>
                    </span>
                    <input type="text" class="form-control" placeholder="Telegram" value="{{ $user->telegram }}" wire:model.lazy="telegram">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class="fa fa-github"></i>
                    </span>
                    <input type="text" class="form-control" placeholder="GitHub" value="{{ $user->github }}" wire:model.lazy="github">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class="fa fa-youtube"></i>
                    </span>
                    <input type="text" class="form-control" placeholder="YouTube" value="{{ $user->youtube }}" wire:model.lazy="youtube">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
