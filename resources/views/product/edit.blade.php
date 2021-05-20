@extends('layouts.tabler')

@section('title', 'Edit ' . $product->name)

@section('content')
<div class="page-header">
    <h1 class="page-title">
        Edit {{ $product->name }}
    </h1>
</div>

<div class="row">
    <div class="col-md-7">
        <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Edit Product</h3>
                </div>
                <div class="card-body">
                  <form action="/dashboard/product/{{ $product->id }}" method="post">

                    @csrf
                    @method('put')

                    <div class="form-group">
                      <label class="form-label">Nama Product</label>
                      <input type="text" class="form-control @error('name')
                      is-invalid
                      @enderror" name="name" placeholder="Nama product" value="{{ $product->name }}" required>
                      @error('name')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label class="form-label">Deskripsi</label>
                      <textarea name="description" rows="5" class="form-control @error('description')
                      is-invalid
                      @enderror">{{ $product->description }}</textarea>
                      @error('description')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label class="form-label">Harga</label>
                      <input class="form-control @error('price')
                      is-invalid
                      @enderror" placeholder="Harga" name="price" required type="number" value="{{ $product->price }}">
                      @error('price')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label class="form-label">Size</label>
                      <input type="text" class="form-control @error('size')
                      is-invalid
                      @enderror" name="size" placeholder="X,M,L,XL" value="{{ $product->size }}">
                      @error('price')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label class="form-label">Discount</label>
                      <input type="number" min="0" max="100" class="form-control @error('discount')
                      is-invalid
                      @enderror" name="discount" placeholder="0" value="{{ $product->discount }}">
                      @error('size')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                        <div class="form-label">Stock</div>
                        <div class="custom-switches-stacked">
                          <label class="custom-switch">
                            <input type="radio" name="stock" value="1" class="custom-switch-input" {{ $product->stock ? 'checked=""' : '' }}>
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description">Tersedia</span>
                          </label>
                          <label class="custom-switch">
                            <input type="radio" name="stock" value="0" class="custom-switch-input" {{ !$product->stock ? 'checked=""' : '' }}>
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description">Habis</span>
                          </label>
                        </div>
                        @error('stock')
                      <div class="text-danger">
                          {{ $message }}
                      </div>
                      @enderror
                      </div>

                    <div class="form-footer">
                      <button class="btn btn-primary btn-block" type="submit">Save</button>
                    </div>
                  </form>
                </div>
              </div>
    </div>
</div>
@endsection
