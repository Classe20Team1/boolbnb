@extends('layouts.boolbnb')

@section('title')
  Dettagli appartamento
@endsection

@section('content')
  <section class="apartment-details">
    <h2>Via San Carlo, bilocale in the city centre</h2>
    <div class="text-box">
      Roma, Lazio, Italia
    </div>
    <div class="apartment-imgs">
      <div class="apartment-imgs-left">
        <img src="{{ asset('img/apt-1.png') }}" alt="main-img" class="left-border-radius-helper">
      </div>
      {{-- <div class="apartment-imgs-right">
        <div class="apartment-imgs-box margin-right-helper margin-bottom-helper">
          <img src="{{ asset('img/apt-2.png') }}" alt="apartment-img">
        </div>
        <div class="apartment-imgs-box margin-bottom-helper">
          <img src="{{ asset('img/apt-3.png') }}" alt="apartment-img" class="top-right-border-radius-helper">
        </div>
        <div class="apartment-imgs-box margin-right-helper">
          <img src="{{ asset('img/apt-4.png') }}" alt="apartment-img">
        </div>
        <div class="apartment-imgs-box">
          <img src="{{ asset('img/apt-5.png') }}" alt="apartment-img" class="bottom-right-border-radius-helper">
        </div>
      </div> --}}
    </div>
    <h3>Intero appartamento - Host: Pippo Pluto</h3>
    <div class="margin-2-helper">1 camera da letto · 2 letti · 1 bagno · 50&#13217; </div>
    <div class="line-separator"></div>
    <div class="apartment-description">
      <p>In pieno centro, solo 3 minuti a piedi dalla fermata dell' aerobus. 10 minuti a piedi dalla stazione, dalle Due Torri e piazza Maggiore.
      5 minuti a piedi da via indipendenza, museo Mambo, la piccola Venezia,
      dal teatro Arena del sole e dal parcheggio privato di piazza XIII agosto, (mercato la Montagnola). Parcheggio sotto casa a pagamento.</p>
      <div class="host-btn">
        <a href="#">Contatta l'host</a>
      </div>
    </div>
    <div class="line-separator"></div>
    <div class="services-list">
      <h4>Sistemazione</h4>
      <ul class="apt-basics-list">
        <li>
          <i class="fas fa-bed fa-2x"></i>
          <div><b>Letti</b> 1</div>
        </li>
        <li>
          <i class="fas fa-door-open fa-2x"></i>
          <div><b>Camere</b> 1</div>
        </li>
        <li>
          <i class="fas fa-bath fa-2x"></i>
          <div><b>Bagni</b> 1</div>
        </li>
      </ul>
      <h4>Servizi e altre opzioni</h4>
      <ul class="apt-basics-list">
        <li>
          <i class="fas fa-wifi fa-2x"></i>
          <div>Wi-Fi</div>
        </li>
        <li>
          <i class="fas fa-car fa-2x"></i>
          <div>Posto Macchina</div>
        </li>
        <li>
          <i class="fas fa-swimmer fa-2x"></i>
          <div>Piscina</div>
        </li>
        <li>
          <i class="fas fa-concierge-bell fa-2x"></i>
          <div>Portineria</div>
        </li>
        <li>
          <i class="fas fa-hot-tub fa-2x"></i>
          <div>Sauna</div>
        </li>
        <li>
          <i class="fas fa-water fa-2x"></i>
          <div>Vista mare</div>
        </li>
      </ul>
    </div>
    <div class="line-separator"></div>
    <div class="apt-position">
      <h3>Posizione</h3>
      <div class="apt-map-box">
        <img src="{{ asset('img/map-example-2.png') }}" alt="apartment-map">
      </div>
    </div>
  </section>
@endsection
