@extends('layouts.app')

@section('title', $toko_name)
@section('description', $toko_description)

@section('content')
<div id="categories">

            <div class="">
                <h1 class="text-2xl font-semibold">Kategori</h1>
            </div>

            <div class="flex flex-row overflow-x-scroll space-x-2 my-5">

                @forelse ((new App\Models\Category)->get() as $item)

                <a href="/category/{{ $item->name }}" class="flex-1 px-4 py-1 rounded-lg bg-purple-100 hover:bg-purple-600 hover:text-white" > {{ $item->name }} </a>
                @empty

                @endforelse
            </div>
</div>

            <div class="mb-3">
                <h1 class="text-2xl font-bold">Products {{ isset($name) ? $name : ''}}</h1>
            </div>

            <div id="list-products" class="grid grid-cols-2 md:grid-cols-4 gap-2" x-data="">

                @forelse ($products as $product)

                    <a href="{{ asset("/product/$product->slug") }}" class="relative hover:bg-purple-100 rounded-md p-1">
                        <div class="flex flex-col items-center">
                            <img src="{{ $product->images->first()->url }}" alt="{{ $product->name }}" class="h-52 md:h-64 w-full object-cover rounded-md transition ease-in-out duration-200 transform hover:scale-95">
                            <span class="font-medium font-sans text-md">{{ $product->name }}</span>
                            @if (!$product->discount)
                                <span class="font-light font-mono text-sm">Rp. {{ number_format($product->price) }}</span>
                            @else
                              <span class="font-light font-mono text-sm">Rp. {{ number_format( $product->price - ($product->price * ($product->discount/100))) }} </span>
                              <strike class="text-gray-400 text-sm font-light font-mono">Rp. {{ number_format($product->price) }}</strike>
                            @endif
                        </div>
                        @if (!$product->stock)

                            <div class="absolute inset-0 h-full bg-black text-white opacity-60 rounded flex items-center justify-center -m-px">Habis</div>
                        @endif

                        @if ($product->discount > 0)
                            <div class="absolute top-1 left-1">
                                <span class="py-1 px-2 mr-2 bg-yellow-400 text-yellow-800 rounded-md"> -{{ $product->discount }}%</span>
                            </div>
                        @endif

                    </a>
                @empty

                @endforelse

            </div>

            {{ $products->links() }}
@endsection
