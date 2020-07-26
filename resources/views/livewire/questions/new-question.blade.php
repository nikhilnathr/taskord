<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="h5 pt-3 pb-3 text-success card-header">
                <i class="fa fa-question mr-1"></i>
                New Question
            </div>
            <div class="card-body">
                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show mb-3">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ session('message') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show mb-3">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ session('error') }}
                    </div>
                @endif
                <form wire:target="submit" wire:submit.prevent="submit">
                    <div class="mb-3">
                        <label class="form-label font-weight-bold">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Ask and discuss!" wire:model="title">
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label font-weight-bold">Body</label>
                        <textarea class="form-control @error('body') is-invalid @enderror" rows="6" placeholder="What's on your mind?" wire:model="body"></textarea>
                        @error('body')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    @if ($body)
                    <div>
                        <div class="h6 font-weight-bold mb-3">
                            <i class="fab fa-markdown mr-1"></i>
                            Markdown Preview
                        </div>
                        <span class="task-font">@markdown($body)</span>
                    </div>
                    @else
                    <div class="h6 font-weight-bold mb-3">
                        <i class="fab fa-markdown mr-1"></i>
                        Markdown is supported
                    </div>
                    @endif
                    <button type="submit" class="btn btn-primary">Ask</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm">
        <div class="card mb-4">
            <div class="card-header">
                Preview
            </div>
            <div class="d-flex list-group-item align-items-center p-3">
                
            </div>
        </div>
        <div class="text-black-50">
            <span>
                © Taskord
            </span>
        </div>
    </div>
</div>
