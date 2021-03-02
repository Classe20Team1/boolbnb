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
        <form class="search-bar-form" action="{{ route('apartment.search')}}" method="post">
            @csrf
            @method('post')
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
@endsection
