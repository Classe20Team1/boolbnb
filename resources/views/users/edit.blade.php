@extends('layouts.boolbnb')

@section('title')
  Modifica informazioni utente
@endsection

@section('content')
  <section class="login-form register-form">
    <div class="login-form-container register-form-container">
    <a href="/admin">Torna alla DashBoard</a>
      <div class="login-form-header">
        Modifica informazioni utente
      </div>
      <div class="login-card">
        <form class="" action="{{ route('user.update', $user ) }}" method="post">
        @csrf
        @method('PATCH')

          <div class="login-form-element">
            <label for="fullname">{{ __('Full Name*') }}</label>
            <input id="fullname" type="text" name="fullname" value="{{ $user->info->fullname }}" required autocomplete="fullname" autofocus>
            @error('fullname')
              <span class="" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="login-form-element">
            <label for="username">{{ __('Username*') }}</label>
            <input id="username" type="text" name="username" value="{{ $user->username }}" required autocomplete="username" autofocus>
            @error('username')
              <span class="" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="login-form-element">
            <label for="birthdate">{{ __('Birthdate*') }}</label>
            <input id="birthdate" type="date" min="1900-01-01" max="{{ date('Y-m-d') }}" name="birthdate" value="{{ $user->info->birthdate }}" required autocomplete="birthdate" autofocus>
            @error('birthdate')
              <span class="" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="login-form-element">
            <label for="sex">{{ __('Sex*') }}</label>
            <select id="sex" class="form-control @error('sex') is-invalid @enderror" name="sex" value="{{ $user->info->sex }}" required autocomplete="sex" autofocus>
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
            <input id="phone_number" type="text" name="phone_number" value="{{ $user->info->phone_number }}" required autocomplete="phone_number" autofocus>
            @error('phone_number')
              <span class="" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="login-form-element">
            <label for="fiscal_code">{{ __('Fiscal Code') }}</label>
            <input id="fiscal_code" type="text" name="fiscal_code" value="{{ $user->info->fiscal_code }}" required autocomplete="fiscal_code" autofocus>
            @error('fiscal_code')
              <span class="" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="login-form-element">
            <label for="p_iva">{{ __('VAT Number') }}</label>
            <input id="p_iva" type="text" name="p_iva" value="{{ $user->info->p_iva }}" required autocomplete="p_iva" autofocus>
            @error('username')
              <span class="" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="login-form-element">
            <label for="address">{{ __('Address') }}</label>
            <input id="address" type="text" name="address" value="{{ $user->info->address }}" required autocomplete="address" autofocus>
            @error('address')
              <span class="" role="alert">
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
                  {{ __('Modifica') }}
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
@endsection
