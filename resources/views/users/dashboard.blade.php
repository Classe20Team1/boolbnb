@extends('layouts.boolbnb')

@section('title')
  User Dashboard
@endsection

@section('content')

<div class="row">


  <a href="{{route('apartments.index')}}">

        <i class="fas fa-house-user"></i>
        <span class="">I miei appartamenti</span>

  </a>

  <a href="{{route('apartments.create')}}">

          <i class="fas fa-plus-circle"></i>
          <span class="">Inserisci un nuovo appartamento</span>

  </a>

    <div class="container">

          <div id="dashboard">

              <my-dashboard :user="{{$user}}"> </my-dashboard>

          </div>

    </div>

</div>
@endsection
