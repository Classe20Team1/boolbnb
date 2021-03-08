@extends('layouts.boolbnb')

@section('title')
  Dettagli appartamento
@endsection

@section('content')
  <section class="apartment-details">
 
  
    <h2>{{$apartment->title}}</h2>
    <div class="text-box">
      
    </div>
    <div class="apartment-imgs">
      <div class="apartment-imgs-left">
        <img src="{{ asset('$apartment->cover_img') }}" alt="main-img" class="left-border-radius-helper">
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
    <h3>Intero appartamento - Host: {{ Auth::user()->username }}</h3>
    <div class="margin-2-helper"> {{$apartment->metri_quadrati}}&#13217; </div>
    <div class="line-separator"></div>
    <div class="apartment-description">
      <p>{{$apartment->description}}</p>
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
          <div><b>Letti</b>{{$apartment->beds}} </div>
        </li>
        <li>
          <i class="fas fa-door-open fa-2x"></i>
          <div><b>Camere</b> {{$apartment->rooms}}</div>
        </li>
        <li>
          <i class="fas fa-bath fa-2x"></i>
          <div><b>Bagni</b> {{$apartment->bathrooms}}</div>
        </li>
      </ul>
      <h4>Servizi e altre opzioni</h4>
     
      <ul class="apt-basics-list">
        <li>
          <i class="fas fa-wifi fa-2x" ></i>
         
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
