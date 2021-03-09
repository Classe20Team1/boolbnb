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
        <img src="{{asset($apartment->cover_img)}}" alt="apartment cover img" class="left-border-radius-helper">
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
    <h3>Intero appartamento - Host: {{ $apartment->user->username }}</h3>
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
        <li class="show-mg-helper">
          <i class="fas fa-bed fa-2x"></i>
          <div><b>Letti:</b> {{$apartment->beds}} </div>
        </li>
        <li class=show-mg-helper-2>
          <i class="fas fa-door-open fa-2x"></i>
          <div><b>Camere:</b> {{$apartment->rooms}}</div>
        </li>
        <li>
          <i class="fas fa-bath fa-2x"></i>
          <div><b>Bagni:</b> {{$apartment->bathrooms}}</div>
        </li>
      </ul>
      <h4>Servizi e altre opzioni</h4>

      <ul class="apt-basics-list services-edit">
        <?php
        $array = array("fa-wifi", "fa-dog", "fa-car", "fa-swimmer", "fa-concierge-bell", "fa-hot-tub", "fa-water");
        ?>
        @foreach ($services as $service)

        <li>
          <i class="fas {{ $array[$service->id -1] }} fa-2x {{ $apartment->services->contains($service) ? 'colorblue' : 'colorgrey' }}"></i>
          <div>{{$service->name}}</div>
        </li>

        @endforeach

      </ul>

      </ul>

    </div>
    <div class="line-separator"></div>
    <div class="apt-position">
      <h3>Posizione</h3>
      <div class="apt-map-box" id="showMap">

        <div id="map-container">

            <show-map :apartmentinfo= "{{$apartment}}" :position="{{$apartment->position}}"></show-map>

        </div>
        <!-- <img src="{{ asset('img/map-example-2.png') }}" alt="apartment-map"> -->
      </div>
    </div>

  </section>
@endsection
