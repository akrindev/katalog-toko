@extends('layouts.tabler')

@section('title', 'Dashboard')

@section('content')

<div class="page-header">
    <h1 class="page-title">Dashboard</h1>
</div>

    <div class="row row-cards">
        <div class="col-md-4">

            <div class="card">
                <div class="card-body">
                    Hi,
                    {{ auth()->user()->name }}. <br> <br>
                    Kamu memiliki <strong> {{ $products->total() }} </strong> products.
                    <strong>{{ (new App\Models\Product)->where('stock', 1)->count() }} </strong> products masih <span class="text-success"> tersedia </span> dan <strong>{{ (new App\Models\Product)->where('stock', 0)->count() }}</strong> lainnya telah <span class="text-danger">habis</span>. <br> <br>
                    Harga tertinggi yang di jual adalah <strong>Rp. {{ number_format((new App\Models\Product)->max('price')) }}</strong>
                </div>
            </div>
        </div>
              <div class="col-md-8">
                  <div class="my-3">
                      <a href="/dashboard/add/product" class="btn btn-outline-primary"><i class="fe fe-plus"></i> Tambah Product </a>
                  </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Products</h3>
                    </div>
                  <table class="table card-table table-vcenter">
                    <tbody>
                    @forelse ($products as $product)
                    <tr>
                      <td class="px-2"><img src="{{ $product->images->first()->url }}" alt="{{ $product->name }}" class="h-8" style="object-fit: cover"></td>
                      <td class="pl-2">
                        {{ $product->name }} <div>
                        <strong class="{{ $product->stock ? 'text-success' : 'text-danger' }}">{{ $product->stock ? 'tersedia' : 'habis' }}</strong> @if($product->discount > 0) .  {{ $product->discount }}% @endif - <a href="/dashboard/product/{{ $product->id}}">edit</a></div>
                      </td>
                      <td class="text-right text-muted d-none d-md-table-cell text-nowrap"><div>
                        @forelse ($product->categories as $category)
                            <span class="badge bg-secondary">{{ $category->name }}</span>
                        @empty

                        @endforelse
                    </div>{{ $product->size }}</td>
                      <td class="text-right text-muted d-none d-md-table-cell text-nowrap">{{ $product->created_at->format('d-m-Y H:i') }}</td>
                      <td class="text-right font-sans text-nowrap">
                          @if (!$product->discount)
                              <strong>Rp. {{ number_format($product->price) }}</strong>
                          @else
                              <strong>Rp. {{ number_format( $product->price - ($product->price * ($product->discount/100))) }} </strong>
                              <br>
                              <strike class="text-muted">Rp. {{ number_format($product->price) }}</strike>
                          @endif
                        </td>
                    </tr>
                    @empty

                    @endforelse

                    <tr>
                        <td colspan="5" class="text-center"> <a href="/dashboard/products">tampilkan semua product</a> </td>
                    </tr>

                  </tbody></table>
                </div>
              </div>
            </div>
@endsection
