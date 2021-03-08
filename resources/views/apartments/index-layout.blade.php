@extends('layouts.boolbnb')

@section('title')
  I miei appartamenti
@endsection

@section('content')
  <div class="myapt-list-container">
    <h2>I miei appartamenti</h2>
    <div class="my-apt-card">
      <div class="my-apt-img-box">
        <img src="{{ asset($apartments[3]->cover_img) }}" alt="apartment-preview">
      </div>
      <div class="my-apt-infos">
        <h4>Grazioso appartamento in centro a Bologna</h4>
        <p>In pieno centro, solo 3 minuti a piedi dalla fermata dell' aerobus. 10 minuti a piedi dalla stazione, dalle Due Torri e piazza Maggiore.
        5 minuti a piedi da via indipendenza, museo Mambo, la piccola Venezia,
        dal teatro Arena del sole e dal parcheggio privato di piazza XIII agosto, (mercato la Montagnola). Parcheggio sotto casa a pagamento.</p>
      </div>
      <div class="card-separator"></div>
      <div class="my-apt-actions">
        <div class="actions-left">
          <ul>
            <li>
              <a href="#">
                <button type="button" name="button">
                  Dettagli
                </button>
              </a>
            </li>
            <li>
              <a href="#">
                <button type="button" name="button">
                  Modifica
                </button>
              </a>
            </li>
            <li>
              <a href="#">
                <button type="button" name="button">
                  Elimina
                </button>
              </a>
            </li>
          </ul>
        </div>
        <div class="actions-right">
          <ul>
            <li>
              <a href="#">
                <button type="button" name="button">
                  Sponsorizza
                </button>
              </a>
            </li>
            <li>
              <a href="#">
                <button type="button" name="button">
                  Statistiche
                </button>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
@endsection
