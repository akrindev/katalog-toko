@extends('layouts.tabler')

@section('title', 'Dashboard Product')

@section('content')
<div class="page-header">
    <h1 class="page-title">My Products</h1>
</div>

    <div class="row row-cards">
              <div class="col-12">
                  <div class="mb-5">
                      <div class="float-right">
                          <a href="/dashboard/add/product/" class="btn btn-primary"><i class="fe fe-plus"></i> Tambah Product</a>
                      </div>
                  </div>
                <div class="card">
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

                  </tbody></table>
                </div>

                {{ $products->links() }}
              </div>
            </div>
@endsection
