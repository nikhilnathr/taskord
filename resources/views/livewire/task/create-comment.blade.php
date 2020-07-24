<div>
    <div class="card mt-4">
        <div class="card-body">
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show mt-2">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{ session('success') }}
                </div>
            @endif
            @if(session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show mt-2">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{ session('error') }}
                </div>
            @endif
            @error('task')
                <div class="alert alert-danger alert-dismissible fade show mt-2">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{ $message }}
                </div>
            @enderror
            <form wire:submit.prevent="submit">
                <div class="mb-3">
                    <textarea placeholder="Add a comment" class="form-control" rows="3" wire:model="comment"></textarea>
                </div>
                <button wire:loading.attr="disabled" class="btn btn-sm btn-primary" type="submit">
                    <i class="fa fa-plus mr-1"></i>
                    Add Comment
                </button>
            </form>
        </div>
    </div>
</div>
