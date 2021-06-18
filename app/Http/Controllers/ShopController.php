<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ShopController extends Controller
{
    public function home()
    {
        $products = Product::latest()->paginate(16);

        return view('home', compact('products'));
    }

    public function show(Product $product)
    {
        $products = Product::inRandomOrder()->take(4)->get();

        return view('show', compact('product', 'products'));
    }

    public function category($name)
    {
        $products = Product::whereHas('categories', function ($query) use ($name) {
            $query->where('name', '=', $name);
        })->latest()->paginate(16);

        return view('home', compact('products', 'name'));
    }
}
