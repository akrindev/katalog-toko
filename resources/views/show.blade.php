@extends('layouts.app')

@section('title', $product->name)
@section('description', $product->description)
@section('image', $product->images->first()->url)

@section('content')
<div id="list-products" class="flex flex-row">

   <div x-data="{swiper: null}" x-init="swiper = new Swiper($refs.container, {
      loop: true,
      slidesPerView: 1,
      spaceBetween: 0,
      autoplay: {
        delay:2000
      },

      breakpoints: {
        640: {
          slidesPerView: 1,
          spaceBetween: 0,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 0,
        },
        1024: {
          slidesPerView: 3,
          spaceBetween: 0,
        },
      },
    })" class="relative w-10/12 mx-auto flex flex-row">
  <div class="absolute inset-y-0 left-0 z-10 flex items-center">
    <button @click="swiper.slidePrev()" class="bg-white -ml-2 lg:-ml-4 flex justify-center items-center w-10 h-10 rounded-full shadow focus:outline-none">
      <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-left w-6 h-6">
        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
      </svg>
    </button>
  </div>

  <div class="swiper-container" x-ref="container">
    <div class="swiper-wrapper">
      <!-- Slides -->

      @forelse ($product->images as $img)

      <div class="swiper-slide p-4">
        <div class="flex flex-col rounded shadow overflow-hidden">
          <div class="">
            <img class="h-48 w-64 object-cover" src="{{ $img->url }}" alt="{{ $product->name }}">
          </div>
        </div>
      </div>
      @empty

      @endforelse

      {{-- slides --}}
    </div>
  </div>

  <div class="absolute inset-y-0 right-0 z-10 flex items-center">
    <button @click="swiper.slideNext()" class="bg-white -mr-2 lg:-mr-4 flex justify-center items-center w-10 h-10 rounded-full shadow focus:outline-none">
      <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-right w-6 h-6">
        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
      </svg>
    </button>
  </div>
</div>

            </div>

            <div class="md:flex lg:justify-between space-y-3 items-center my-3 lg:pr-3">
                <div class="flex flex-col">
                    <h1 class="text-2xl font-extrabold font-sans">{{ $product->name }}</h1>
                    <div>
                            @if (!$product->discount)
                                <span class="font-light font-mono text-sm">Rp. {{ number_format($product->price) }}</span>
                            @else
                            <span class="py-1 px-2 mr-2 bg-yellow-400 text-yellow-800 rounded-md"> -{{ $product->discount }}%</span>
                              <span class="font-light font-mono text-sm">Rp. {{ number_format( $product->price - ($product->price * ($product->discount/100))) }} </span>
                              <strike class="text-gray-400 text-sm font-light font-mono">Rp. {{ number_format($product->price) }}</strike>
                            @endif
                    </div>
                    <div class="py-1">
                        <span class="px-2 py-1 bg-gray-300 rounded-md">{{ $product->categories->first()->name ?? '' }}</span>
                    </div>
                </div>
                <div>
                    <button class="bg-green-500 hover:bg-green-700 text-white md:px-9 py-2 rounded-xl flex items-center justify-center space-x-2 w-full md:w-auto" onclick="window.open(`//api.whatsapp.com/send/?phone={{ $toko_whatsapp }}&text=${encodeURIComponent('{{ url()->current() }} \r\n \r\n Hai Admin, saya ingin tau tentang product ini. boleh di bantu?')}`)">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 fill-current">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"></path>
                        </svg>
                        <span> Order via Whatsapp</span>
                    </button>
                </div>

            </div>

            {{-- ukuran --}}

            <div class="my-5">
                <h2 class="text-2xl font-bold">Size</h2>
                <div>
                    @forelse (explode(',', $product->size) as $size)
                        <span class="px-2 py-0.5 rounded-md bg-blueGray-300 text-blueGray-700">{{ $size }}</span>
                    @empty

                    @endforelse
                </div>
            </div>

            <div class="my-5">
                <h2 class="text-2xl font-bold">Stock</h2>
                <div>
                    @if ($product->stock)
                        <span class="text-green-600">Tersedia</span>
                    @else
                        <span class="text-rose-600">Habis</span>
                    @endif
                </div>
            </div>
            <div class="my-5">
                <h2 class="text-2xl font-bold">Deskripsi</h2>
                <div class="prose lg:prose-lg">
                    {{ $product->description }}
                </div>
            </div>

<hr>
<div class="my-5">

            <div class="mb-3">
                <h2 class="text-2xl font-bold">Products Lainnya</h2>
            </div>

            <div id="random-products" class="grid grid-cols-2 md:grid-cols-4 gap-2" x-data="">

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
</div>
@endsection