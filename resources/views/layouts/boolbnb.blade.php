<!-- BoolBnb template (Navbar e Footer) -->

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>BoolBnb - @yield('title')</title>

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
        <ul>
          <li>
            Appartamenti
            <div class="underline"></div>
          </li>
          <li>
            Ricerca avanzata
            <div class="underline"></div>
          </li>
        </ul>
      </div>
      <div class="nav-user">
        <ul class="nav-right-list-2">
          <li>
              @guest
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
                  @if (Route::has('register'))
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                      </li>
                  @endif
                  @else
                  <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="/admin" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->username }}
                      </a>
                      <a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>

                  </li>
              @endguest
            </a>
          </li>
        </ul>
      </div>
    </nav>

    @yield('content')

    <footer>
      <span> &copy; Boolean Careers All rights reserved </span>
    </footer>

  </body>
</html>
