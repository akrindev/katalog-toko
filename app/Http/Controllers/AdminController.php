<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AdminController extends Controller
{
    public function dashboard()
    {
        $products = Product::latest()->paginate();

        return view('dashboard', compact('products'));
    }

    public function products()
    {
        $products = Product::latest()->paginate(20);

        return view('product.show', compact('products'));
    }

    public function editProduct($id)
    {
        $product = Product::findOrFail($id);

    }

    public function updateProduct($id)
    {
        $product = Product::findOrFail($id);

    }

    public function destroyProduct($id)
    {
        $product = Product::findOrFail($id);

    }
}
