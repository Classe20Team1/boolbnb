@extends('layouts.boolbnb')
@section('content')

<div class='row mt-5 mb-5 '>
<div class='col-4 offset-md-4 mt-5'>
<div class="card">
  <div class="card-body">
  <h3 class='mb-4' style='text-align: center; color: black'>Aggiornamento dati Utente</h3>
  
  <a class="btn btn-dark mb-5" href='/'><i class="fas fa-arrow-circle-left"> Indietro</i></a>

    <h5 class="card-title"><i class="far fa-address-card"> Nome e Cognome: {{ $info->fullname }}</i></h5> <br>
    <h6 class="card-subtitle mb-2 text-muted"><i class="far fa-address-card"> P:Iva {{ $info->p_iva  }}</i></h6>
    <h6 class="card-subtitle mb-2 text-muted"><i class="fas fa-genderless"> Sesso: {{ $info->sex }}</i></h6>
    <p class="card-text"><i class="fas fa-phone-alt"> Numero di Telefono: {{ $info->phone_number }}</i></p>
    <h6 class="card-subtitle mb-2 text-muted"><i class="far fa-address-card"> Data di nascita: {{ $info->birthdate }}</i></h6>
    <h6 class='card-subtitle mt-2 mb-2 text-muted'><i class="far fa-address-card"> Codice Fiscale: {{ $info->fiscal_code }}</i></h6>
    <h6 class='card-subtitle mt-2 mb-2 text-muted'><i class="fas fa-home"> Indirizzo: {{ $info->address }}</i></h6>
   
  </div>
</div>
</div>
</div>

@endsection