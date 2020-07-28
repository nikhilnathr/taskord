<li class="list-group-item pt-2 pb-2">
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <i class="fa fa-times mr-1"></i>
            {{ session('error') }}
        </div>
    @endif
    <div class="">
        <input
            class="form-check-input"
            type="checkbox"
            wire:click="checkTask"
            unchecked
        />
        <span class="ml-1 task-font">
            {!! Purify::clean(preg_replace('/#(\w+)/', '<a href="product/$1">#$1</a>', $task->task)) !!}
        </span>
        @if ($task->image)
        <div>
            <img class="img-fluid border mt-3 rounded" src="{{ asset('storage/' . $task->image) }}" />
        </div>
        @endif
    </div>
</li>
