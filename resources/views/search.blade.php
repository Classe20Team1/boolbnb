@extends('layouts.boolbnb')

@section('title')
  Advanced Search
@endsection

@section('content')
  <div class="advanced-search">
    <div class="search-results">
      <h5>Oltre 300 alloggi</h5>
      <h1>Roma: alloggi</h1>
      <div class="search-filters">
        <ul>
          <li>Numero di stanze</li>
          <li>Numero di bagni</li>
          <li>Wi-Fi</li>
          <li>Posto macchina</li>
          <li>Piscina</li>
          <li>Portineria</li>
          <li>Sauna</li>
          <li>Vista mare</li>
        </ul>
      </div>
      <div class="apartments-card">
        <div class="apartment-img-box">
          <img src="{{ asset('img/apartment-example.png') }}" alt="logo">
        </div>
        <div class="apartment-features">
          <div class="font-helper-1">Intero appartamento a Bologna</div>
          <div class="font-helper-2">Appartamento in centro a Bologna vista torri</div>
          <div class="font-helper-1">
            1 ospite • 1 camera da letto • 1 letto 1 bagno
          </div>
          <div class="font-helper-1">
            Wi-fi • Piscina
          </div>
          <div class="price-tag">
            <b>35€</b> / notte
          </div>
        </div>
      </div>
      <div class="apartments-card">
        <div class="apartment-img-box">
          <img src="{{ asset('img/apartment-example.png') }}" alt="logo">
        </div>
        <div class="apartment-features">
          <div class="font-helper-1">Intero appartamento a Bologna</div>
          <div class="font-helper-2">Appartamento in centro a Bologna vista torri</div>
          <div class="font-helper-1">
            1 ospite • 1 camera da letto • 1 letto 1 bagno
          </div>
          <div class="font-helper-1">
            Wi-fi • Piscina
          </div>
          <div class="price-tag">
            <b>35€</b> / notte
          </div>
        </div>
      </div>
      <div class="apartments-card">
        <div class="apartment-img-box">
          <img src="{{ asset('img/apartment-example.png') }}" alt="logo">
        </div>
        <div class="apartment-features">
          <div class="font-helper-1">Intero appartamento a Bologna</div>
          <div class="font-helper-2">Appartamento in centro a Bologna vista torri</div>
          <div class="font-helper-1">
            1 ospite • 1 camera da letto • 1 letto 1 bagno
          </div>
          <div class="font-helper-1">
            Wi-fi • Piscina
          </div>
          <div class="price-tag">
            <b>35€</b> / notte
          </div>
        </div>
      </div>
      <div class="apartments-card">
        <div class="apartment-img-box">
          <img src="{{ asset('img/apartment-example.png') }}" alt="logo">
        </div>
        <div class="apartment-features">
          <div class="font-helper-1">Intero appartamento a Bologna</div>
          <div class="font-helper-2">Appartamento in centro a Bologna vista torri</div>
          <div class="font-helper-1">
            1 ospite • 1 camera da letto • 1 letto 1 bagno
          </div>
          <div class="font-helper-1">
            Wi-fi • Piscina
          </div>
          <div class="price-tag">
            <b>35€</b> / notte
          </div>
        </div>
      </div>
      <div class="apartments-card">
        <div class="apartment-img-box">
          <img src="{{ asset('img/apartment-example.png') }}" alt="logo">
        </div>
        <div class="apartment-features">
          <div class="font-helper-1">Intero appartamento a Bologna</div>
          <div class="font-helper-2">Appartamento in centro a Bologna vista torri</div>
          <div class="font-helper-1">
            1 ospite • 1 camera da letto • 1 letto 1 bagno
          </div>
          <div class="font-helper-1">
            Wi-fi • Piscina
          </div>
          <div class="price-tag">
            <b>35€</b> / notte
          </div>
        </div>
      </div>

    </div>
    <div class="map-box">

    </div>
  </div>
@endsection
