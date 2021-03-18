<!-- BoolBnb template (Navbar e Footer) -->

<!DOCTYPE html>
<html lang="en" dir="ltr">


  <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>BoolBnb - @yield('title')</title>

        <!-- Scripts -->

        <!-- JQUERY -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- TOMTOM -->
        <script  src="https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.64.0/maps/maps-web.min.js"></script>
        <script  src="https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.64.0/services/services-web.min.js"></script>

        <!-- BRAINTREE -->
        <script src="https://js.braintreegateway.com/web/dropin/1.26.1/js/dropin.js"></script>

        <!-- MYJS -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->

        <!-- TOMTOM style -->
        <link  rel='stylesheet'  type='text/css'  href='https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.64.0/maps/maps.css'>

        <!-- FONTS -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;700&display=swap" rel="stylesheet">

        <!-- FONTAWESOME -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

        <!-- MYSTYLE -->
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/app.css">

  </head>

  <body>

    <nav id="navi">

        <div class="row">

              <section class="container d-flex section-nav jcsb relative">

                    <!-- NAV LOGO -->
                    <div class="nav-el">

                        <div class="logo-container">

                              <a href="/"> <img src="{{ asset('img/logobnb.jpg') }}" alt="logo"> </a>

                        </div>

                    </div>

                    <!-- SEARCHBAR -->
                    <div class="nav-el">

                          <form class="search-bar-form d-flex jcsb" action="{{ route('search')}}" method="post">
                                @csrf
                                @method('post')

                                <div class="searchbar-el">

                                    <label for="city">Dove</label><br>
                                    <input type="text" id="city" name="city" value="" placeholder="Dove vuoi andare?" required>

                                </div>

                                <div class="searchbar-el search-bar-guest-input">

                                    <label for="guests">Ospiti</label><br>
                                    <input type="text" id="guests" name="guests" placeholder="Aggiungi ospiti">

                                </div>

                                <div class="searchbar-el">

                                    <button type="submit" name="submit">
                                    <i class="fas fa-search"></i>
                                    </button>

                                </div>

                          </form>


                    </div>

                    <!-- LOGIN -->
                    <div class="nav-el">

                          <button id="login-button" class="right-nav-menu-button d-flex">

                              <i class="fa fa-bars user-icon bar-icon" aria-hidden="true"></i>
                              <i class="fa fa-user-circle user-icon" aria-hidden="true"></i>

                          </button>

                    </div>

                    <div id="login-list" class="login-list-container">

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
                                <span> Ciao {{ Auth::user()->username }}! </span>

                                <li class="dropdown-helper">

                                   <a href="/admin">Dashboard</a>

                                </li>

                                <li>

                                      <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                          @csrf
                                          <button type="submit" name="button">{{ __('Logout') }}</button>
                                      </form>


                                </li>

                            @endguest

                      </ul>

                    </div>

              </section>

        </div>

    </nav>



    <main>
      @yield('content')
    </main>

    <footer class="mt-50">
      <h3>Classe 20 Team 1</h3>
      <ul>
        <li>
          <a href="https://github.com/AlbertoLiguori">Alberto Liguori</a>
        </li>
        <li>
          <a href="https://github.com/francescagiorno">Francesca Giorno</a>
        </li>
        <li>
          <a href="https://github.com/fra-mstr">Francesco Maestroni</a>
        </li>
        <li>
          <a href="https://github.com/mattponk89">Matteo Ponchietti</a>
        </li>
        <li>
          <a href="https://github.com/nico-m11">Nicola Melito</a>
        </li>
      </ul>
      <h4>&copy; Boolean Careers All rights reserved</h4>
    </footer>
    <script src="{{ asset('js/various.js') }}" defer></script>
  </body>
</html>
