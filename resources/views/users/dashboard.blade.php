@extends('layouts.boolbnb')

@section('title')
  User Dashboard
@endsection

@section('content')
  <section class="dashboard-container">
    <h2>Account</h2>
    <div class="dashboard-username">
      <b class="dashboard-font-helper">{{$user->username}}</b> · {{$user->email}}
    </div>
    <div class="dashboard-sections">
      <div class="dashboard-card">
        <a href="{{route('user.edit')}}">
          <i class="far fa-id-card"></i>
          <h3 class="dashboard-font-helper">Modifica informazioni personali</h3>
          <div class="">
            Comunicaci i tuoi dati personali e le modalità per contattarti
          </div>
        </a>
      </div>
      <div class="dashboard-card">
        <a href="{{route('apartments.index')}}">
          <i class="fas fa-house-user"></i>
          <h3 class="dashboard-font-helper">I miei appartamenti</h3>
          <div class="">
            Scorri la lista dei tuoi appartamenti messi a disposizione dei tuoi futuri ospiti nel mondo.
          </div>
        </a>
      </div>
      <div class="dashboard-card">
        <a href="{{route('apartments.create')}}">
          <i class="fas fa-plus-circle"></i>
          <h3 class="dashboard-font-helper">Inserisci un nuovo appartamento</h3>
          <div class="">
            Hai un nuovo appartamento da condividere? Aggiungilo al tuo profilo pubblico.
          </div>
        </a>
      </div>
    </div>
  </section>
@endsection
