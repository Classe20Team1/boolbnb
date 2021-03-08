@extends('layouts.boolbnb')

@section('title')
  Advanced Search
@endsection

@section('content')








      <div id="app">

      <my-main :searchedcity= "{{ $data }}" :services= "{{$services}}"></my-main>


      <div class="map-box">

      </div>


      </div>








@endsection
