<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="h5 pt-3 pb-3 text-success card-header">
                <i class="fa fa-box-open mr-1"></i>
                New Product
            </div>
            <div class="card-body">
                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show mb-3">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ session('message') }}
                    </div>
                @endif
                @if(session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show mb-3">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ session('error') }}
                    </div>
                @endif
                @error('name')
                    <div class="alert alert-warning alert-dismissible fade show mt-2">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ $message }}
                    </div>
                @enderror
                @error('slug')
                    <div class="alert alert-danger alert-dismissible fade show mt-2">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ $message }}
                    </div>
                @enderror
                @error('description')
                    <div class="alert alert-warning alert-dismissible fade show mt-2">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ $message }}
                    </div>
                @enderror
                <form wire:target="submit" wire:submit.prevent="submit">
                    <div class="mb-3">
                        <label class="form-label font-weight-bold">Name of the product</label>
                        <input type="text" class="form-control" placeholder="Simply the name of the product" wire:model="name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label font-weight-bold">Slug</label>
                        <input type="text" class="form-control" placeholder="Product Slug (/taskord)" wire:model.lazy="slug">
                    </div>
                    <div class="mb-3">
                        <label class="form-label font-weight-bold">Description</label>
                        <textarea class="form-control"rows="3" placeholder="Some words about your awesome product" wire:model="description"></textarea>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa fa-link"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="Website" wire:model.lazy="website">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa fa-twitter"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="Twitter" wire:model.lazy="twitter">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa fa-github"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="GitHub" wire:model.lazy="github">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa fa-product-hunt"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="Product Hunt" wire:model="producthunt">
                    </div>
                    <div class="mb-3">
                        <div class="font-weight-bold mb-2">Status</div>
                        <input class="form-check-input" type="checkbox" wire:model="launched">
                        <span class="ml-1"><span class="ml-1">This product is launched</span></span>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
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
                <span class="rounded bg-secondary p-4 mt-1 ml-2" src="" height="50" width="50" /></span>
                <span class="ml-3">
                    <span class="mr-2 h5 align-text-top font-weight-bold text-dark">
                        {{ $name ? $name : 'Product Name'}}
                        <span class="small ml-2">{{ $launched ? '🚀' : '' }}</span>
                    </span>
                    <div>{{ $description ? $description : 'Product Description'}}</div>
                    <button class="btn btn-sm btn-primary mt-2">
                        <i class="fa fa-plus mr-1"></i>
                        Subscribe
                    </button>
                </span>
                <a class="ml-auto" href="{{ route('user.done', ['username' => Auth::user()->username]) }}">
                    <img class="rounded-circle float-right avatar-30 mt-1 ml-2" src="{{ Auth::user()->avatar }}" height="50" width="50" />
                </a>
            </div>
        </div>
        <div class="text-black-50">
            <span>
                © Taskord
            </span>
        </div>
    </div>
</div>
