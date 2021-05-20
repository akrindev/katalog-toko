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

        return view('product.edit', compact('product'));
    }

    public function updateProduct($id)
    {
        $product = Product::findOrFail($id);

        $data = request()->validate([
            'name' => 'required|min:5',
            'description' => 'required|min:5',
            'price' => 'required|integer',
            'size' => 'required',
            'discount' => 'nullable',
            'stock' => 'required|boolean',
        ]);

        $product->update($data);

        session()->flash('success', 'Product berhasil di update');

        return \redirect()->intended('/dashboard');
    }

    public function destroyProduct($id)
    {
        $product = Product::findOrFail($id);

        return view('product.show', compact('product'));
    }

    // setting
    public function setting()
    {
        //
    }
}
