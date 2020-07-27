<div>
    <div class="card mt-4">
        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show mt-2">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{ session('success') }}
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show mt-2">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{ session('error') }}
                </div>
            @endif
            @error('comment')
                <div class="alert alert-danger alert-dismissible fade show mt-2">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{ $message }}
                </div>
            @enderror
            <div class="mb-3">
                <textarea placeholder="Add a comment" class="form-control" rows="3" wire:model="comment"></textarea>
            </div>
            @if ($comment)
            <div>
                <div class="h6 font-weight-bold mb-3">
                    <i class="fab fa-markdown mr-1"></i>
                    Markdown Preview
                </div>
                <span class="task-font">@markdown($comment)</span>
            </div>
            @else
            <div class="h6 font-weight-bold mb-3">
                <i class="fab fa-markdown mr-1"></i>
                Markdown is supported
            </div>
            @endif
            <button class="btn btn-sm btn-primary" type="submit" wire:click="submit">
                <i class="fa fa-plus mr-1"></i>
                Add Comment
            </button>
        </div>
    </div>
</div>
