<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>BoolBnb - @yield('title')</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
  </head>
  <body>

    <header>
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
      <div class="hero">
        <div class="hero-img-box">
          <img src="{{ asset('img/hero.jpg') }}" alt="logo">
        </div>
        <h1>Grazie agli host puoi.</h1>
        <div class="search-bar">
          <form class="search-bar-form" action="index.html" method="post">
            <div class="left-input">
              <label for="">Dove</label><br>
              <input type="text" name="city" value="" placeholder="Dove vuoi andare?" required>
            </div>
            <div class="right-input">
              <div class="">
                <label for="">Ospiti</label><br>
                <input type="text" name="guests" value="" placeholder="Aggiungi ospiti" required>
              </div>
              <div class="">
                <button type="submit" name="submit">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </header>

    <main>
      <h1>Una casa ovunque nel mondo</h1>
      <div class="cities-cards-container">
        <div class="city-card mg-card">
          <img src="{{ asset('img/milan.jpg') }}" alt="logo">
          <h3 class="city-card-label">Milan</h5>
        </div>
        <div class="city-card mg-card">
          <img src="{{ asset('img/naples.jpg') }}" alt="logo">
          <h3 class="city-card-label">Naples</h5>
        </div>
        <div class="city-card mg-card">
          <img src="{{ asset('img/rome.jpg') }}" alt="logo">
          <h3 class="city-card-label">Rome</h5>
        </div>
        <div class="city-card">
          <img src="{{ asset('img/venice.jpg') }}" alt="logo">
          <h3 class="city-card-label">Venice</h5>
        </div>
      </div>
      <div class="host-poster-box">
        <div class="">
          <h1>Il tuo mondo merita di essere condiviso</h1>
          <h5>Trasforma lo spazio in più in una nuova opportunità.</h5>
          <button type="button" name="button">
            Diventa host
          </button>
        </div>
        <div class="">

        </div>
      </div>
    </main>

    <footer>
      <span> &copy; Boolean Careers All rights reserved </span>
    </footer>

  </body>
</html>
