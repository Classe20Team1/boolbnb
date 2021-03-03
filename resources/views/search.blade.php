@extends('layouts.boolbnb')

@section('title')
  Advanced Search
@endsection

@section('content')



      <div id="app">

      <my-main :ciccio= "{{ $apartments }}" ></my-main>

      <div class="map-box">

      </div>

      </div>








@endsection
