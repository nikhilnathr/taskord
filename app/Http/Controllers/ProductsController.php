<?php

namespace App\Http\Controllers;

class ProductsController extends Controller
{
    public function newest()
    {
        return view('products.newest', [
            'type' => 'products.newest',
        ]);
    }

    public function launched()
    {
        return view('products.launched', [
            'type' => 'products.launched',
        ]);
    }

    public function new()
    {
        return view('products.new');
    }
}
