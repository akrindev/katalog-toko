<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate();

        $products->map(function ($item) {
            $item->featured_image = $item->images->first();

            return $item;
        });

        return new ProductCollection($products);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    /**
     * get random products
     *
     * @return \Illuminate\Http\Response
     */
    public function random()
    {
        $products = Product::inRandomOrder()->take(4)->get();

        return new ProductCollection($products);
    }
}
