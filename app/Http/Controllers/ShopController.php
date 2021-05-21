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

    public function show($slug)
    {
        $product = Product::whereSlug($slug)
                    ->firstOrFail();

        return view('show', compact('product'));
    }

    public function category($name)
    {
        $products = Product::with([
            'categories' => function ($query) use ($name) {
                return $query->where('name', '=', $name);
            }
        ])->latest()->paginate(16);

        return view('home', compact('products', 'name'));
    }
}
