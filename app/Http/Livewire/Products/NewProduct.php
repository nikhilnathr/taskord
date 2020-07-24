<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use App\Product;
use Auth;
use Carbon\Carbon;

class NewProduct extends Component
{
    public $name;
    public $slug;
    public $description;
    public $website;
    public $twitter;
    public $github;
    public $producthunt;
    public $launched;
    
    public function submit()
    {
        $validatedData = $this->validate([
            'name' => 'required|profanity',
            'slug' => 'required|profanity|max:20',
            'description' => 'required|profanity',
        ],
        [
            'name.profanity' => 'Please check your words!',
            'slug.profanity' => 'Please check your words!',
            'description.profanity' => 'Please check your words!',
        ]);
        
        if (Auth::user()->isFlagged) {
            return session()->flash('error', 'Your account is flagged!');
        }
        
        $launched = ! $this->launched ? false : true;
        
        if ($launched) {
            $launched_status = true;
            $launched_at = Carbon::now();
            $updated_at = Carbon::now();
        } else {
            $launched_status = false;
            $launched_at = null;
        }
        
        $check = Product::where('slug', $this->slug)->first();
        if ($check === null) {
           $product = Product::create([
                'user_id' =>  Auth::user()->id,
                'name' => $this->name,
                'slug' => $this->slug,
                'avatar' => 'https://github.com/taskord.png',
                'description' => $this->description,
                'website' => $this->website,
                'twitter' => $this->twitter,
                'github' => $this->github,
                'producthunt' => $this->producthunt,
                'launched' => $launched_status,
                'launched_at' => $launched_at,
            ]);
            
            session()->flash('message', 'Product has been created!');
            return redirect()->route('product.done', ['slug' => $product->slug]);
        } else {
            return session()->flash('error', 'Product already exists!');
        }
    }
    
    public function render()
    {
        return view('livewire.products.new-product');
    }
}
