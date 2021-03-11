<!-- BoolBnb template (Navbar e Footer) -->

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>BoolBnb - @yield('title')</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"> -->
    <script src="https://js.braintreegateway.com/web/dropin/1.26.1/js/dropin.js"></script>
    <!-- BootStrap -->
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> --}}
    <!-- Scripts -->

    <script  src="https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.64.0/maps/maps-web.min.js"></script>
    <script  src="https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.64.0/services/services-web.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- TOMTOM style -->
    <link  rel='stylesheet'  type='text/css'  href='https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.64.0/maps/maps.css'>


    <link rel="stylesheet" href="/css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

  </head>
  <body>
    <nav>
      <div class="nav-logo-box">
        <a href="/">
          <img src="{{ asset('img/logo.png') }}" alt="logo">
        </a>
      </div>
      <div class="nav-contents">
        <div class="search-bar">
          <form class="search-bar-form" action="{{ route('search')}}" method="post">
              @csrf
              @method('post')
            <div class="left-input">
              <label for="city">Dove</label><br>
              <input type="text" id="city" name="city" value="" placeholder="Dove vuoi andare?" required>
            </div>
            <div class="right-input">
              <div class="">
                <label for="guests">Posti letto</label><br>
                <input type="number" id="guests" name="guests" step="1" value="1">
              </div>
              <div class="">
                <button type="submit" name="submit">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
        <!-- <ul>
          <li>
            Appartamenti
            <div class="underline"></div>
          </li>
          <li>
            Ricerca avanzata
            <div class="underline"></div>
          </li>
        </ul> -->
      </div>
      <div class="nav-user">
        <ul class="nav-right-list-2">

              @guest
                  <li class="nav-item mg-nav-1">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
                  @if (Route::has('register'))
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                      </li>
                  @endif
                  @else
                  <li class="nav-item logged dropdown">
                      <a class="nav-link dropdown-toggle mg-nav-1" href="/admin" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->username }} &dtrif;
                      </a>
                      <div class="nav-dropdown">
                        <ul>
                          <li class="dropdown-helper">
                            <a href="/admin">
                              Dashboard
                            </a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                          </li>
                        </ul>
                      </div>
                      <!-- <a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form> -->

                  </li>
              @endguest
            </a>

        </ul>
      </div>
    </nav>

    <main>
      @yield('content')
    </main>

    <footer>
      <h3>Classe 20 Team 1</h3>
      <ul>
        <li>
          Alberto Liguori ~
          <a href="">https://github.com/AlbertoLiguori</a>
        </li>
        <li>
          Francesca Giorno ~
          <a href="">https://github.com/francescagiorno</a>
        </li>
        <li>
          Francesco Maestroni ~
          <a href="">https://github.com/fra-mstr</a>
        </li>
        <li>
          Matteo Ponchietti ~
          <a href="">https://github.com/mattponk89</a>
        </li>
        <li>
          Nicola Melito ~
          <a href="">https://github.com/nico-m11</a>
        </li>
      </ul>
      <h4>&copy; Boolean Careers All rights reserved</h4>
    </footer>
  </body>
</html>
