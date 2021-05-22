@extends('layouts.tabler')

@section('title', 'Pengaturan Toko')

@section('content')
    <div class="page-header">
        <h1 class="page-title">Pengaturan Toko</h1>
    </div>

    <div class="row">
        <div class="col-md-6">

            <div class="card">
                <div class="card-body">
                    <form action="/dashboard/setting" method="POST">
                        @csrf
                        @method('put')

                        <div class="form-group">
                            <label class="form-label"> Nama Toko</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $toko->name }}" name="name" required>

                            @error('name')
                             <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label"> Toko Deskripsi</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="5">{{ $toko->description }}</textarea>

                            @error('description')
                             <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>



                        <div class="form-group">
                            <label class="form-label">Whatsapp</label>
                            <input type="text" class="form-control @error('whatsapp') is-invalid @enderror" name="whatsapp" value="{{ $toko->whatsapp }}" required>
                            @error('whatsapp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Facebook</label>
                            <input type="text" class="form-control @error('facebook') is-invalid @enderror" name="facebook" value="{{ $toko->facebook }}" required>
                            @error('facebook')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Instagram</label>
                            <input type="text" class="form-control @error('instagram') is-invalid @enderror" name="instagram" value="{{ $toko->instagram }}" required>
                            @error('instagram')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-footer">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection