@extends('layouts.tabler')

@section('content')
<div class="row">
            <div class="col col-login mx-auto">
              <div class="text-center mb-6">
                  @forelse ($errors as $error)
                      {{ $error }}
                  @empty

                  @endforelse
                {{-- <img src="./assets/brand/tabler.svg" class="h-6" alt=""> --}}
              </div>
              <form class="card" action="/register" method="post">
                @csrf
                <div class="card-body p-6">
                  <div class="card-title">Create new account</div>
                  <div class="form-group">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter name" required>
                  </div>
                  <div class="form-group">
                    <label class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                  </div>
                  <div class="form-group">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                  </div>
                  <div class="form-group">
                    <label class="form-label">Password Confirmation</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Password" required>
                  </div>
                  <div class="form-footer">
                    <button type="submit" class="btn btn-primary btn-block">Create new account</button>
                  </div>
                </div>
              </form>
              <div class="text-center text-muted">
                Already have account? <a href="/login">Sign in</a>
              </div>
            </div>
          </div>
@endsection
