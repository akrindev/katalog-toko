@extends('layouts.tabler')

@section('title', 'Pengaturan Akun')

@section('content')
    <div class="page-header">
        <h1 class="page-title">Pengaturan Akun</h1>
    </div>

    <div class="row">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Akun</h2>
                </div>
                <div class="card-body">

                    <form action="{{ route('dashboard.setting.akun') }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Whatsapp</label>
                            <input type="text" class="form-control @error('whatsapp') is-invalid @enderror" name="whatsapp" value="{{ $user->whatsapp }}" required>
                            @error('whatsapp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Facebook</label>
                            <input type="text" class="form-control @error('facebook') is-invalid @enderror" name="facebook" value="{{ $user->facebook }}" required>
                            @error('facebook')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Instagram</label>
                            <input type="text" class="form-control @error('instagram') is-invalid @enderror" name="instagram" value="{{ $user->instagram }}" required>
                            @error('instagram')
                                <div class="invalid-feedback">
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

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Password</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.setting.password') }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="form-group">
                        <label class="form-label">Password Sekarang</label>
                        <input type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" autocomplete="current-password" required>
                        @error('current_password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Password Baru</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Ulangi Password Baru</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required>
                        @error('password_confirmation')
                            <div class="invalid-feedback">
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
