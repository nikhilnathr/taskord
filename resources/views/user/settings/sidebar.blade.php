<div class="col-sm">
    <div class="card mb-4">
        <div class="card-header">
            Settings
        </div>
        <ul class="list-group list-group-flush">
            <a class="list-group-item list-group-item-action pt-2 pb-2" href="{{ route('user.settings.profile') }}">
                <i class="fa fa-user mr-1"></i>
                Profile
            </a>
            <a class="list-group-item list-group-item-action pt-2 pb-2" href="{{ route('user.settings.account') }}">
                <i class="fa fa-at mr-1"></i>
                Account
            </a>
            <a class="list-group-item list-group-item-action pt-2 pb-2" href="{{ route('user.settings.password') }}">
                <i class="fa fa-key mr-1"></i>
                Password
            </a>
            <a class="list-group-item list-group-item-action text-danger pt-2 pb-2" href="{{ route('user.settings.delete') }}">
                <i class="fa fa-exclamation-triangle mr-1"></i>
                Danger Zone
            </a>
        </ul>
    </div>
</div>
