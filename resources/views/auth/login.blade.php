@extends('layouts.boolbnb')

@section('title')
  Login
@endsection

@section('content')
  <section class="login-form">
    <div class="login-form-container">
      <div class="login-form-header">
        Login
      </div>
      <div class="login-card">
        <form class="" action="" method="post">
        @csrf
        @method('Post')

          <div class="login-form-element">
            <label for="email">E-Mail</label>
            <input id="email" type="email" name="email" value="{{old('email')}}" required autocomplete="email" autofocus>
            @error('email')
              <span class="" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="login-form-element">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="login-form-btn">
            <div class="">
              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

              <label class="form-check-label" for="remember">
                  {{ __('Remember Me') }}
              </label>
            </div>
            <div class="">
              <button type="submit" class="">
                  {{ __('Login') }}
              </button>
              @if (Route::has('password.request'))
                  <a class="btn btn-link" href="{{ route('password.request') }}">
                      {{ __('Forgot Your Password?') }}
                  </a>
              @endif
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
@endsection
