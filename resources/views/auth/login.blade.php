@extends('layouts.tabler')

@section('content')
    <div class="row">
            <div class="col col-login mx-auto">
              <div class="text-center mb-6">
                  {{--  --}}
                  @forelse ($errors as $error)
                      {{ $error }}
                  @empty

                  @endforelse
              </div>
              <form class="card" action="/login" method="post">
                @csrf
                <div class="card-body p-6">
                  <div class="card-title">Login to your account</div>
                  <div class="form-group">
                    <label class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" autofocus required>
                  </div>
                  <div class="form-group">
                    <label class="form-label">
                      Password
                      <a href="{{ route('password.request') }}" class="float-right small">I forgot password</a>
                    </label>
                    <input type="password" name="password" class="form-control" id="password"
                    autocomplete="current-password" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" />
                      <span class="custom-control-label">Remember me</span>
                    </label>
                  </div>
                  <div class="form-footer">
                    <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                  </div>
                </div>
              </form>
              <div class="text-center text-muted">
                Don't have account yet? <a href="./register.html">Sign up</a>
              </div>
            </div>
          </div>
@endsection
