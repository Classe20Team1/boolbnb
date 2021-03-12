@extends('layouts.boolbnb')

@section('title')
  Home
@endsection

@section('content')
  <header>
    <div class="hero">
      <div class="hero-img-box">
        <img src="{{ asset('img/hero.jpg') }}" alt="logo">
      </div>
      <h1>Grazie agli host puoi.</h1>

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
              <!-- <input type="text" name="beds" value="" placeholder="Numero posti letto" required> -->
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
    </div>
  </header>
  <main>
    <h1>Una casa ovunque nel mondo</h1>
    <div class="cities-cards-container">
      <div class="city-card mg-card">
      <form action="{{ route('search') }}" name="city" id="city" method='post' required>
        <button style='background-color: white; border: none'type="submit" name='city' id='city' value='Milano'>
            @csrf
            @method('post')
            <img src="{{ asset('img/milan.jpg') }}" alt="logo">
            <h3 class="city-card-label">Milano</h5>
        </button>
      </form>
      </div>
      <div class="city-card mg-card">
        <form action="{{ route('search') }}" name="city" id="city" method='post' required>
          <button style='background-color: white; border: none'type="submit" name='city' id='city' value='Napoli'>
            @csrf
            @method('post')
            <img src="{{ asset('img/naples.jpg') }}" alt="logo">
            <h3 class="city-card-label">Napoli</h5>
          </button>
        </form>
      </div>
      <div class="city-card mg-card">
        <form action="{{ route('search') }}" name="city" id="city"  method='post' required>
          <button style='background-color: white; border: none'type="submit" name='city' id='city' value='Roma'>
            @csrf
            @method('post')
            <img src="{{ asset('img/rome.jpg') }}" alt="logo">
            <h3 class="city-card-label">Roma</h5>
          </button>
        </form>
      </div>
      <div class="city-card">
      <form action="{{ route('search') }}" name="city" id="city"  method='post' required>
        <button style='background-color: white; border: none'type="submit" name='city' id='city' value='Venezia'>
            @csrf
            @method('post')
            <img src="{{ asset('img/venice.jpg') }}" alt="logo">
            <h3 class="city-card-label">Venezia</h5>
        </button>
      </form>
      </div>
    </div>

    <h1>Appartamenti in evidenza</h1>
    <div class="sponsored-apt-container">
    
      
        @foreach($apartments as $appart)
          
          <div class="sponsored-card">
            <img src="{{ asset($appart->cover_img) }}" alt="apartment-preview">
            {{ $appart->title }}
            <div class="sponsored-description">
             <b>Descrizione:</b> {{ $appart->description}}
            </div>
            <div class="sponsored-price">
             <b> Prezzo a Notte:</b> {{ $appart->price }} €
            </div>
            <i class="fas fa-star sponsored-icon"></i>
          </div>
          
        @endforeach
     

    </div>

    <div class="host-poster-box">
      <div class="">
        <h1>Il tuo mondo merita di essere condiviso</h1>
        <h5>Trasforma lo spazio in più in una nuova opportunità.</h5>
        <button type="button" name="button">
          Diventa host
        </button>
      </div>

    </div>
  </main>
@endsection
