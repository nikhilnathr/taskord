<div class="col-md-8">
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show mb-3">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{ session('message') }}
        </div>
    @endif
    <div class="card mb-4">
        <div class="card-header">
            Profile
        </div>
        <div class="card-body">
            <form wire:submit.prevent="updateName">
                <div class="mb-3">
                    <label class="form-label">Firstname</label>
                    <input type="text" class="form-control" value="{{ $user->firstname }}" wire:model.lazy="firstname">
                </div>
                <div class="mb-3">
                    <label class="form-label">Lastname</label>
                    <input type="text" class="form-control" value="{{ $user->lastname }}" wire:model.lazy="lastname">
                </div>
                <div class="mb-3">
                    <label class="form-label">Bio</label>
                    <textarea class="form-control"rows="3" wire:model.lazy="bio">{{ $user->bio }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Location</label>
                    <input type="text" class="form-control" value="{{ $user->location }}" wire:model.lazy="location">
                </div>
                <div class="mb-3">
                    <label class="form-label">Company</label>
                    <input type="text" class="form-control" value="{{ $user->company }}" wire:model.lazy="company">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            Social
        </div>
        <div class="card-body">
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
