<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Image;
use App\Models\Shop;
use DB;


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

    // add product
    public function addProduct()
    {
        return view('product.add');
    }

    public function storeProduct()
    {
        $data = request()->validate([
            'name' => 'required|min:5',
            'description' => 'required|min:5',
            'price' => 'required|integer',
            'size' => 'nullable',
            'discount' => 'nullable',
            'stock' => 'required|boolean',
        ]);

        $product = new Product;

        DB::transaction(function() use ($data, $product) {

            $img = [];
            if(! \request()->images) {
                \array_push($img, [
                    'url'   => 'http://placekitten.com/400/300'
                ]);
            } else {

                foreach(request()->images as $image) {
                    \array_push($img, [
                        'url' => $image
                    ]);
                }
            }

            $cat = Category::find(request()->category);

            $product->fill($data + ['slug' => Str::slug($data['name'].Str::random(5))])->save();

            $product->categories()->sync($cat);

            $product->images()->createMany($img);
        });

        session()->flash('success', 'Product berhasil di tambahkan');

        return \redirect()->intended('/dashboard');
    }

    // edit product

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
            'size' => 'nullable',
            'discount' => 'nullable',
            'stock' => 'required|boolean',
        ]);

        DB::transaction(function () use ($data, $product) {

            $product->update($data);

            $cat = Category::find(request()->category);

            $product->categories()->sync($cat);

            $product->images()->whereNotIn('url', \request('images'))->delete();

            foreach (request()->images as $image) {
                if(is_null($image)) {
                    continue;
                }

                $product->images()->updateOrCreate([
                    'url' => $image
                ], [
                    'url' => $image
                ]);
            }

        });

        session()->flash('success', 'Product berhasil di update');

        return \redirect()->intended('/dashboard');
    }

    public function destroyProduct($id)
    {
        $product = Product::findOrFail($id);

        $product->images()->delete();

        $product->delete();

        session()->flash('success', 'Product di hapus');

        return \redirect()->intended('/dashboard');
    }

    // setting
    public function setting()
    {
        $toko = Shop::first();

        return view('setting', compact('toko'));
    }

    public function updateSetting()
    {
        $data = request()->validate([
            'name'  => 'required|min:2',
            'description'  => 'nullable',
        ]);

        Shop::first()->update($data);

        session()->flash('success', 'Data toko telah di ubah');

        return \back();
    }


    // product category

    public function productCategory()
    {
        $categories = Category::orderByDesc('id')->get();

        return view('product.category', \compact('categories'));
    }

    public function addCategory()
    {
        $data = request()->validate([
            'name'  => 'required'
        ]);

        Category::create($data);

        session()->flash('success', 'kategori di tambahkan');

        return back();
    }

    public function updateProductCategory($id)
    {
        $data = \request()->validate([
            'name'  => 'required'
        ]);

        $category = Category::findOrFail($id);

        $category->update($data);

        session()->flash('success', 'Category di ubah');

        return \back();
    }

    public function deleteProductCategory($id)
    {
        $category = Category::findOrFail($id);

        $category->products()->detach();

        $category->delete();

        session()->flash('success', 'Category di hapus');

        return \back();
    }
}
