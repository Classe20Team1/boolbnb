@extends('layouts.boolbnb')

@section('title')
  Home
@endsection

@section('content')
<div class="aligner">

  <!-- HERO -->
  <header class="hero row">

          <div class="container">

              <div class="hero-title-container">

                      <h1>Viaggia dove vuoi.<br>Grazie agli host puoi.</h1>

              </div>

          </div>

  </header>

  <!-- APPARTAMENTI IN EVIDENZA -->
  <section class="row mt-50 appartamenti-in-evidenza-section">

            <div class="container">

                  <h1>Appartamenti in evidenza</h1>

                  <div class="mt-50 sequential-component-container">

                      <div id="sequential">

                            <sequential :array="{{ $apartments }}"></sequential>

                      </div>

                  </div>

            </div>

  </section>

  <!-- CITTÀ IN EVIDENZA -->
  <section class="row mt-50">

            <div class="container">

                  <h1>Una casa ovunque nel mondo</h1>

                  <div class="mt-50 cities-cards-container d-flex jcsb">

                        <div class="city-card">

                              <form action="{{ route('search') }}" name="city" id="city" method='post' required>

                                    <button style='background-color: white; border: none'type="submit" name='city' id='city' value='Milano'>

                                            @csrf
                                            @method('post')
                                            <img src="{{ asset('img/milan.jpg') }}" alt="logo">
                                            <h3 class="city-card-label">Milano</h5>

                                    </button>

                              </form>

                        </div>

                        <div class="city-card">

                              <form action="{{ route('search') }}" name="city" id="city" method='post' required>

                                      <button style='background-color: white; border: none'type="submit" name='city' id='city' value='Napoli'>

                                        @csrf
                                        @method('post')
                                        <img src="{{ asset('img/naples.jpg') }}" alt="logo">
                                        <h3 class="city-card-label">Napoli</h5>

                                      </button>

                              </form>

                        </div>

                        <div class="city-card">

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

            </div>

  </section>

  <section class="row mt-50">

            <div class="container">

                  <div class="host-poster-container d-flex">

                        <div class="host-poster-text-container d-flex">

                              <h1>Il tuo mondo merita di essere condiviso</h1>
                              <h5>Trasforma lo spazio in più in una nuova opportunità.</h5>

                              <button type="button" name="button">
                                <a href="{{ route('register') }}" class="host-link">Diventa host</a>
                              </button>

                        </div>

                        <div class="host-poster-img-container">

                        </div>

                  </div>

          </div>

  </section>

</div>
@endsection
