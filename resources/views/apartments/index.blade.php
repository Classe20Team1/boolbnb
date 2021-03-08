@extends('layouts.boolbnb')

@section('title')
  I miei appartamenti
@endsection

@section('content')
  <div class="myapt-list-container">
    <h2>I miei appartamenti</h2>
  @foreach($apartments as $apartment)
    <div class="my-apt-card mt-5"  style='height:190px'>
      <div class="my-apt-img-box">
     
        <img src="{{asset($apartment->cover_img)}}" alt="apartment-preview">
      </div>
      <div class="my-apt-infos">
        <h4>Titolo: {{$apartment->title}}</h4>
        <p>Descrizione: {{$apartment->description}}</p>
        <span>price: {{$apartment->price}}</span> <br>
        <span>rooms: {{$apartment->rooms}}</span> <br>
        <span>bathrooms: {{$apartment->bathrooms}} - </span> 
        <span> M.quadrati: {{$apartment->metri_quadrati}}</span>
      </div>
      <div class="card-separator"></div>
      <div class="my-apt-actions">
        <div class="actions-left">
          <ul>
            <li>
              <a href="{{route('apartments.show', $apartment->id) }}">
                <button type="button" name="button">
                  Dettagli
                </button>
              </a>
            </li>
            <li>
              <a href="{{route('apartments.edit', $apartment->id)}}">
                <button type="button" name="button">
                  Modifica
                </button>
              </a>
            </li>
            <li>
                <form method="post" class="d-inline"action="{{route('apartments.destroy', $apartment->id)}}">
                  @csrf
                  @method('delete')
                   <button type="submit" class="btn btn-outline-danger" value="Elimina">Elimina</button>
                </form>
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
  @endforeach
  </div>
  <br>
@endsection