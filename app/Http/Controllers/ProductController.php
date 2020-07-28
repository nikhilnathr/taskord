<?php

namespace App\Http\Controllers;

use App\Product;
use App\Task;
use Auth;

class ProductController extends Controller
{
    public function done($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        return view('product.done', [
            'product' => $product,
            'type' => 'product.done',
            'done_count' => Task::where([['product_id', $product->id], ['done', true], ['user_id', $product->user->id]])->count(),
            'pending_count' => Task::where([['product_id', $product->id], ['done', false], ['user_id', $product->user->id]])->count(),
        ]);
    }

    public function pending($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        return view('product.pending', [
            'product' => $product,
            'type' => 'product.pending',
            'done_count' => Task::where([['product_id', $product->id], ['done', true], ['user_id', $product->user->id]])->count(),
            'pending_count' => Task::where([['product_id', $product->id], ['done', false], ['user_id', $product->user->id]])->count(),
        ]);
    }
    
    public function edit($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        if (Auth::user()->staffShip or Auth::user()->id === $product->user_id) {
            return view('product.edit', [
                'product' => $product,
            ]);
        } else {
            return redirect()->route('product.done', [
                'slug' => $product->id,
            ]);
        }
    }
}
