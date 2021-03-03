@extends('layouts.boolbnb')

@section('title')
  I miei appartamenti
@endsection

@section('content')
  <div class="myapt-list-container">
    <h2>I miei appartamenti</h2>
    <div class="my-apt-card">
      <div class="my-apt-img-box">
        <img src="{{ asset('img/apartment-example.png') }}" alt="apartment-preview">
      </div>
      <div class="my-apt-infos">
        <h4>Grazioso appartamento in centro a Bologna</h4>
        <p>In pieno centro, solo 3 minuti a piedi dalla fermata dell' aerobus. 10 minuti a piedi dalla stazione, dalle Due Torri e piazza Maggiore.
        5 minuti a piedi da via indipendenza, museo Mambo, la piccola Venezia,
        dal teatro Arena del sole e dal parcheggio privato di piazza XIII agosto, (mercato la Montagnola). Parcheggio sotto casa a pagamento.</p>
      </div>
      <div class="card-separator"></div>
      <div class="my-apt-actions">
        <ul>
          <li>
            <a href="#">Modifica</a>
          </li>
          <li>
            <a href="#">Sponsorizza</a>
          </li>
          <li>
            <a href="#">Statistiche</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="my-apt-card">
      <div class="my-apt-img-box">
        <img src="{{ asset('img/apartment-example.png') }}" alt="apartment-preview">
      </div>
      <div class="my-apt-infos">
        <h4>Grazioso appartamento in centro a Bologna</h4>
        <p>In pieno centro, solo 3 minuti a piedi dalla fermata dell' aerobus. 10 minuti a piedi dalla stazione, dalle Due Torri e piazza Maggiore.
        5 minuti a piedi da via indipendenza, museo Mambo, la piccola Venezia,
        dal teatro Arena del sole e dal parcheggio privato di piazza XIII agosto, (mercato la Montagnola). Parcheggio sotto casa a pagamento.</p>
      </div>
      <div class="card-separator"></div>
      <div class="my-apt-actions">
        <ul>
          <li>
            <a href="#">Modifica</a>
          </li>
          <li>
            <a href="#">Sponsorizza</a>
          </li>
          <li>
            <a href="#">Statistiche</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="my-apt-card">
      <div class="my-apt-img-box">
        <img src="{{ asset('img/apartment-example.png') }}" alt="apartment-preview">
      </div>
      <div class="my-apt-infos">
        <h4>Grazioso appartamento in centro a Bologna</h4>
        <p>In pieno centro, solo 3 minuti a piedi dalla fermata dell' aerobus. 10 minuti a piedi dalla stazione, dalle Due Torri e piazza Maggiore.
        5 minuti a piedi da via indipendenza, museo Mambo, la piccola Venezia,
        dal teatro Arena del sole e dal parcheggio privato di piazza XIII agosto, (mercato la Montagnola). Parcheggio sotto casa a pagamento.</p>
      </div>
      <div class="card-separator"></div>
      <div class="my-apt-actions">
        <ul>
          <li>
            <a href="#">Modifica</a>
          </li>
          <li>
            <a href="#">Sponsorizza</a>
          </li>
          <li>
            <a href="#">Statistiche</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
@endsection
