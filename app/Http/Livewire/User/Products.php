<?php

namespace App\Http\Livewire\User;

use App\Product;
use Livewire\Component;

class Products extends Component
{
    public $user_id;
    public $page;
    public $perPage;

    public function mount($user, $page, $perPage)
    {
        $this->user_id = $user->id;
        $this->page = $page ? $page : 1;
        $this->perPage = $perPage ? $perPage : 1;
    }

    public function render()
    {
        $products = Product::cacheFor(60 * 60)
            ->where('user_id', $this->user_id)
            ->paginate(20);

        return view('livewire.user.products', [
            'products' => $products,
        ]);
    }
}
