@extends('layouts.tabler')

@section('title', 'Tambah data product')

@section('content')
<div class="page-header">
    <h1 class="page-title">
        Tambah product
    </h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Tambah Product</h3>
                </div>
                <div class="card-body">
                  <form action="/dashboard/add/product/" method="post">

                    <div class="row">
                        <div class="col-md-6">
                    @csrf
                    <div class="form-group">
                      <label class="form-label">Nama Product</label>
                      <input type="text" class="form-control @error('name')
                      is-invalid
                      @enderror" name="name" placeholder="Nama product" value="{{ old('name') }}" required>
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
                      @enderror" placeholder="Deskripsi product">{{ old('description') }}</textarea>
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
                      @enderror" placeholder="Harga" name="price" data-mask="000.000.000.000.000" data-mask-reverse="true" required type="number" id="price" value="{{ old('price') }}">
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
                      @enderror" name="size" placeholder="X,M,L,XL" value="{{ old('size') }}">
                      @error('price')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label class="form-label">Discount</label>
                      <div class="row gutters-xs">
                          <div class="col-6">
                      <div class="input-group">

                          <input type="number" min="0" max="100" class="form-control @error('discount')
                          is-invalid
                          @enderror" name="discount" placeholder="0" value="{{ old('discount') }}" id="pdiskon" aria-describedby="i-percent">
                          <span class="input-group-append" id="i-percent">
                            <span class="input-group-text">%</span>
                          </span>
                          @error('size')
                          <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                      </div>
                      </div>

                          <div class="col-6">
                              <input type="number" class="form-control" id="diskon" disabled data-mask="000.000.000.000" data-mask-reverse="true">
                          </div>

                    </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label">Stock</div>
                        <div class="custom-switches-stacked">
                          <label class="custom-switch">
                            <input type="radio" name="stock" value="1" class="custom-switch-input" checked="">
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description">Tersedia</span>
                          </label>
                          <label class="custom-switch">
                            <input type="radio" name="stock" value="0" class="custom-switch-input">
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


                </div>
{{-- img --}}
                <div class="col-md-6">
                    <div class="form-group">
                          <label class="form-label">Foto Product</label>
                          <div class="row gutters-sm" id="product-image">
                            <div class="col-6 col-sm-4">
                              <label class="imagecheck mb-4">
                                <input name="images[]" type="checkbox" value="0" class="imagecheck-input">
                                <figure class="imagecheck-figure">
                                  <img src="//source.unsplash.com/random" alt="}" class="imagecheck-image">
                                </figure>
                              </label>
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                            <span id="upload_widget" class="btn btn-primary"> <i class="fe fe-plus"></i> Tambah Foto Product</span>
                        </div>
                </div>

                {{-- endimg --}}
                </div>

                <div class="form-footer">
                      <button class="btn btn-primary btn-block" type="submit">Save</button>
                    </div>
                  </form>
                </div>
              </div>
    </div>
</div>

              <script>
                require(['input-mask']);
              </script>

<script>
    function d(e) {
        return document.getElementById(e)
    }
    let harga = d('price')
    let diskon = d('diskon')
    let pdiskon = d('pdiskon')

    function getDiskon(harga, pdiskon) {
        harga = harga.split('.').join('')
        return (harga - (harga * (pdiskon/100)))
    }

    harga.addEventListener('input', () => {
        diskon.value = getDiskon(harga.value, pdiskon.value)
    })

    pdiskon.addEventListener('input', () => {
        diskon.value = getDiskon(harga.value, pdiskon.value)
    })
</script>

<script src="https://upload-widget.cloudinary.com/global/all.js" type="text/javascript"></script>

<script type="text/javascript">
var myWidget = cloudinary.createUploadWidget({
  cloudName: 'dy2b35xr3',
  uploadPreset: 'e1gv61od',
  sources: ["local", "url", "camera", "image_search"],
  multiple: false
  },
   (error, result) => {
    if (!error && result && result.event === "success") {

      let addedimg = `<div class="col-6 col-sm-4">
                              <label class="imagecheck mb-4">
                                <input name="images[]" type="checkbox" value="${result.info.secure_url}" class="imagecheck-input" checked="">
                                <figure class="imagecheck-figure">
                                  <img src="${result.info.thumbnail_url}" alt="}" class="imagecheck-image">
                                </figure>
                              </label>
                            </div>`;

      d('product-image').innerHTML += addedimg;
    }
  }
)

document.getElementById("upload_widget").addEventListener("click", function(){
    myWidget.open();
  }, false);
</script>
@endsection
