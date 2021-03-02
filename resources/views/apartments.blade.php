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
      <div class="apartment-imgs-right">
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
      </div>
    </div>
    <h3>Intero appartamento - Host: Pippo Pluto</h3>
    <div class="margin-2-helper">4 ospiti · 1 camera da letto · 2 letti · 1 bagno</div>
    <div class="line-separator"></div>
    <p class="apartment-description">In pieno centro, solo 3 minuti a piedi dalla fermata dell' aerobus. 10 minuti a piedi dalla stazione, dalle Due Torri e piazza Maggiore.
    5 minuti a piedi da via indipendenza, museo Mambo, la piccola Venezia,
    dal teatro Arena del sole e dal parcheggio privato di piazza XIII agosto, (mercato la Montagnola). Parcheggio sotto casa a pagamento.</p>
    <div class="host-msg">
      <a href="#">Contatta l'host</a>
    </div>
    <div class="line-separator"></div>
    <div class="services-list">
      <h3>Sistemazione</h3>
      <div class="service-box">
        <div class="services-icons-box">
          <i class="fas fa-bed"></i>
        </div>
        <div class="">
          Letti: 2
        </div>
      </div>
      <div class="service-box margin-2-helper">
        <div class="services-icons-box">
          <i class="fas fa-bath"></i>
        </div>
        <div class="">
          Bagni: 1
        </div>
      </div>
      <h3>Servizi</h3>
      <div class="service-box">
        <div class="services-icons-box">
          <i class="fas fa-wifi"></i>
        </div>
        <div class="">
          Wi-Fi
        </div>
      </div>
      <div class="service-box">
        <div class="services-icons-box">
          <i class="fas fa-car"></i>
        </div>
        <div class="">
          Posto macchina
        </div>
      </div>
      <div class="service-box">
        <div class="services-icons-box">
          <i class="fas fa-swimming-pool"></i>
        </div>
        <div class="">
          Piscina
        </div>
      </div>
    </div>
  </section>
@endsection
