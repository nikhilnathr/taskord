<?php

namespace App\Http\Livewire\Admin;

use App\Product;
use App\Task;
use App\User;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class Adminbar extends Component
{
    public function render()
    {
        if (file_exists('../.git/HEAD')) {
            $branch = File::get('../.git/HEAD');
            $explodedstring = explode('/', $branch, 3);
            $branchname = str_replace("\n", '', $explodedstring[2]);
        } else {
            $branchname = 'master';
        }

        $version = File::get('../VERSION');

        // DB Details
        $tasks = Task::count();
        $users = User::count();
        $products = Product::count();
        $reputations = User::all()->sum('reputation');

        return view('livewire.admin.adminbar', [
            'version' => $version,
            'branchname' => $branchname,
            'tasks' => $tasks,
            'users' => $users,
            'products' => $products,
            'reputations' => $reputations,
        ]);
    }
}
