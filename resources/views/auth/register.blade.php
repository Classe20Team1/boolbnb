@extends('layouts.boolbnb')

@section('title')
  Login
@endsection

@section('content')
  <section class="login-form register-form">
    <div class="login-form-container register-form-container">
      <div class="login-form-header">
        Register
      </div>
      <div class="login-card">
        <form class="" action="" method="post">
        @csrf
        @method('Post')

          <div class="login-form-element">
            <label for="fullname">{{ __('Full Name*') }}</label>
            <input id="fullname" type="text" name="fullname" value="{{old('fullname')}}" required autocomplete="fullname" autofocus>
            @error('fullname')
              <span class="" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="login-form-element">
            <label for="username">{{ __('Username*') }}</label>
            <input id="username" type="text" name="username" value="{{old('username')}}" required autocomplete="username" autofocus>
            @error('username')
              <span class="" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="login-form-element">
            <label for="birthdate">{{ __('Birthdate*') }}</label>
            <input id="birthdate" type="date" min="1900-01-01" max="{{ date('Y-m-d') }}" name="birthdate" value="{{old('birthdate')}}" required autocomplete="birthdate" autofocus>
            @error('birthdate')
              <span class="" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="login-form-element">
            <label for="sex">{{ __('Sex*') }}</label>
            <select id="sex" class="form-control @error('sex') is-invalid @enderror" name="sex" value="{{ old('sex') }}" required autocomplete="sex" autofocus>
              <option value="M">Man</option>
              <option value="F">Fem</option>
              <option value="ND">Not Defined</option>
              <option value="Fluid">Fluid</option>
            </select>
            @error('sex')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="login-form-element">
            <label for="phone_number">{{ __('Phone Number') }}</label>
            <input id="phone_number" type="text" name="phone_number" value="{{old('phone_number')}}" required autocomplete="phone_number" autofocus>
            @error('phone_number')
              <span class="" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="login-form-element">
            <label for="fiscal_code">{{ __('Fiscal Code') }}</label>
            <input id="fiscal_code" type="text" name="fiscal_code" value="{{old('fiscal_code')}}" required autocomplete="fiscal_code" autofocus>
            @error('fiscal_code')
              <span class="" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="login-form-element">
            <label for="p_iva">{{ __('VAT Number') }}</label>
            <input id="p_iva" type="text" name="p_iva" value="{{old('p_iva')}}" required autocomplete="p_iva" autofocus>
            @error('username')
              <span class="" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="login-form-element">
            <label for="address">{{ __('Address') }}</label>
            <input id="address" type="text" name="address" value="{{old('address')}}" required autocomplete="address" autofocus>
            @error('address')
              <span class="" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="login-form-element">
            <label for="email">E-Mail*</label>
            <input id="email" type="email" name="email" value="{{old('email')}}" required autocomplete="email" autofocus>
            @error('email')
              <span class="" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="login-form-element">
            <label for="password">{{ __('Password*') }}</label>
            <input id="password" type="password" name="password" required autocomplete="new-password">
            @error('password')
                <span class="" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="login-form-element">
            <label for="password-confirm">{{ __('Confirm Password*') }}</label>
            <input id="password" type="password" name="password_confirmation" required autocomplete="new-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="login-form-btn">
            <div class="">
              {{ __('* Required') }}
            </div>
            <div class="">
              <button type="submit" class="register-btn">
                  {{ __('Register') }}
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
@endsection
