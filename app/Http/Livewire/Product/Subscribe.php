<?php

namespace App\Http\Livewire\Product;

use Auth;
use Livewire\Component;

class Subscribe extends Component
{
    public $product;

    public function mount($product)
    {
        $this->product = $product;
    }

    public function subscribeProduct()
    {
        if (Auth::check()) {
            if (Auth::user()->isFlagged) {
                return session()->flash('error', 'Your account is flagged!');
            }
            if (Auth::user()->id === $this->product->user->id) {
                return session()->flash('error', 'You can\'t subscribe your own product!');
            } else {
                Auth::user()->toggleSubscribe($this->product);
            }
        } else {
            return session()->flash('error', 'Forbidden!');
        }
    }

    public function render()
    {
        return view('livewire.product.subscribe');
    }
}
