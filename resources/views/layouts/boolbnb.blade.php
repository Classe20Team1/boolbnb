<!-- BoolBnb template (Navbar e Footer) -->

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>BoolBnb - @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <link rel="stylesheet" href="/css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
  </head>
  <body>
    <nav>
      <div class="nav-logo-box">
        <img src="{{ asset('img/logo.png') }}" alt="logo">
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
        <ul class="nav-right-list-1">
          <li>Diventa un host</li>
          <li>
            <i class="fas fa-globe"></i>
          </li>
        </ul>
        <ul class="nav-right-list-2">
          <li>
            <i class="fas fa-bars bars-icon"></i>
            <i class="fas fa-user-circle user-icon"></i>
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
