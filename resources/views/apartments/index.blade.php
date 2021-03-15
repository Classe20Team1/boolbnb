@extends('layouts.boolbnb')

@section('title')
  I miei appartamenti
@endsection

@section('content')

  <div class="myapt-list-container">
    <a href="/admin" class="go-back aptindex-back-link">
      Torna alla Dashboard
    </a>
    <h2>I miei appartamenti</h2>
  @foreach($apartments as $apartment)
    <div class="my-apt-card mt-5">
      <div class="my-apt-img-box">

        <img src="{{asset($apartment->cover_img)}}" alt="apartment-preview">
      </div>
      <div class="my-apt-infos">
        <h4>Titolo: {{$apartment->title}}</h4>
        <div class="apt-details-list">
          <ul>
            <li>price: {{$apartment->price}}</li>
            <li>rooms: {{$apartment->rooms}}</li>
            <li>bathrooms: {{$apartment->bathrooms}}</li>
            <li>M.quadrati: {{$apartment->metri_quadrati}}</li>
          </ul>
        </div>
        <p>{{$apartment->description}}</p>
      </div>
      <div class="card-separator"></div>
      <div class="my-apt-actions">
        <div class="actions-left">
          <ul>
            <li>
              <a href="{{route('apartments.show', $apartment->id) }}">
                <button type="button" name="button" class="actions-btn">
                  Dettagli
                </button>
              </a>
            </li>
            <li>
              <a href="{{route('apartments.edit', $apartment->id)}}">
                <button type="button" name="button" class="actions-btn">
                  Modifica
                </button>
              </a>
            </li>

          </ul>
        </div>
        <div class="actions-right">
          <ul>
            <li>
            @if(in_array($apartment->id, $array_sponsored))
              <form method="post" class="d-inline">
                <button type="submit" class="actions-btn sponsored" value="Sponsorizza">Sponsorizzato</button>
              </form>
            @else
                  <form method="post" class="d-inline"action="{{route('apartments.sponsor', $apartment->id)}}">
                    @csrf
                    @method('post')
                    <button type="submit" class="actions-btn" value="Sponsorizza">
                      Sponsorizza
                    </button>
                  </form>
            @endif
            </li>
            <li>
                <form method="post" class="d-inline"action="{{route('apartments.destroy', $apartment->id)}}">
                  @csrf
                  @method('delete')
                   <button type="submit" class="actions-btn" value="Elimina">Elimina</button>
                </form>
              </a>
            </li>
          </ul>
        </div>
      </div>

    </div>
  @endforeach
  </div>
  <br>
@endsection
