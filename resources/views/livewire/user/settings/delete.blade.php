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
            Danger Zone
        </div>
        <div class="card-body">
            <div class="h5 mb-3">Export your account</div>
            <button wire:click="exportAccount" class="btn btn-success text-white">
                <i class="fa fa-question mr-1"></i>
                Export now
            </button>
            <div class="h5 text-danger mt-3 mb-3">Delete your Account</div>
            @if ($confirming === Auth::user()->id)
            <button wire:click="deleteAccount" class="btn btn-danger">
                <i class="fa fa-question mr-1"></i>
                Are you sure?
                <span wire:loading class="spinner-border spinner-border-sm ml-2" role="status"></span>
            </button>
            @else
            <button wire:click="confirmDelete" class="btn btn-danger">
                <i class="fa fa-trash-alt mr-1"></i>
                Delete now
            </button>
            @endif
        </div>
    </div>
</div>
