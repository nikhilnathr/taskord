<div class="card p-1 rounded-0 d-flex border-bottom border-primary bg-primary text-white">
    <div class="pl-2 pr-2">
        <span class="float-left">
            <span class="font-weight-bold">
                <i class="fa fa-code-branch mr-1"></i>
                {{ $branchname }}
            </span>
            <span class="font-weight-bold ml-3">
                <i class="fab fa-laravel mr-1"></i>
                Laravel v{{ App::VERSION() }}
            </span>
            <span class="font-weight-bold ml-3">
                <i class="fa fa-cube mr-1"></i>
                {{ $version }}
            </span>
            <a class="text-white" href="https://github.com/taskord/taskord" target="_blank">
                <span class="font-weight-bold ml-3">
                    <i class="fa fa-github mr-1"></i>
                    GitHub
                </span>
            </a>
        </span>
        <span class="float-right">
            <span class="font-weight-bold mr-3">
                <i class="fa fa-check mr-1"></i>
                {{ $tasks }} Tasks
            </span>
            <span class="font-weight-bold mr-3">
                <i class="fa fa-users mr-1"></i>
                {{ $users }} Users
            </span>
            <span class="font-weight-bold mr-3">
                <i class="fa fa-box-open mr-1"></i>
                {{ $products }} Products
            </span>
            <span class="font-weight-bold mr-3">
                <i class="fa fa-fire mr-1"></i>
                {{ $reputations }} Reputations
            </span>
            <span class="font-weight-bold">
                <i class="fa fa-clock mr-1"></i>
                {{ round(microtime(true) - LARAVEL_START, 2) * 1000 }}ms Load
            </span>
        </span>
    </div>
</div>
