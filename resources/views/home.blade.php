@extends('layouts.app')

@section('title', 'Dian Busana')

@section('content')

            <div id="categories">

            <div class="">
                <h1 class="text-2xl font-semibold">Kategori</h1>
            </div>

            <div class="flex overflow-y-scroll space-x-2 my-5"
                x-data="{categories: ['all','katun','rayon','benang','tuwil','tiedye']}">

                <template x-for="i in categories">
                    <a href="#" class="px-4 py-1 rounded-lg bg-purple-100 hover:bg-purple-600 hover:text-white" x-text="i"></a>
                </template>
            </div>
            </div>

            <div class="mb-3">
                <h1 class="text-2xl font-bold">Products</h1>
            </div>

            <div id="list-products" class="grid grid-cols-2 md:grid-cols-4 gap-2" x-data="">

                @forelse ($products as $product)

                    <a href="{{ asset("/product/$product->slug") }}" class="hover:bg-purple-100 rounded-md p-1">
                        <div class="flex flex-col items-center">
                            <img src="{{ $product->image()->first()->url }}" alt="{{ $product->name }}" class="h-52 md:h-64 w-full object-cover rounded-md transition ease-in-out duration-200 transform hover:scale-95">
                            <span class="font-semibold">{{ $product->name }}</span>
                            <span class="font-mono">Rp. 100.000</span>
                        </div>
                    </a>
                @empty

                @endforelse

            </div>
@endsection
