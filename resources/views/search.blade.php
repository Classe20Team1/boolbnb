@extends('layouts.boolbnb')

@section('title')
  Advanced Search
@endsection

@section('content')


<h5>Oltre 300 alloggi</h5>
<h1>Roma: alloggi</h1>
<div class="search-filters">
  <h5>sistemazione</h5>
  <form>
  <ul class="basic-filters">
    <li>
      <label for="beds">Letti</label>
      <input type="number" id="beds" name="beds" value="1">
    </li>
    <li>
      <label for="rooms">Camere</label>
      <input type="number" id="rooms" name="rooms" value="1">
    </li>
    <li>
      <label for="bathrooms">Bagni</label>
      <input type="number" id="bathrooms" name="bathrooms" value="1">
    </li>
    <li>
      <label for="">Distanza</span>
      <select class="" name="distance">
        <option value="5">5km</option>
        <option value="20" selected>20km</option>
        <option value="50">50km</option>
        <option value="100">20km</option>
      </select>
    </li>
  </ul>
  <h5>servizi e altre opzioni</h5>
  <ul class="services-filters">
    <li>
      <input type="checkbox" id="wi-fi" name="wi-fi">
      <label for="wi-fi"> Wi-Fi</label>
    </li>
    <li>
      <input type="checkbox" id="posto-macchina" name="posto-macchina">
      <label for="wi-fi"> Posto macchina</label>
    </li>
    <li>
      <input type="checkbox" id="piscina" name="piscina">
      <label for="piscina">Piscina</label>
    </li>
    <li>
      <input type="checkbox" id="portineria" name="portineria">
      <label for="portineria">Portineria</label>
    </li>
    <li>
      <input type="checkbox" id="sauna" name="sauna">
      <label for="sauna">Sauna</label>
    </li>
    <li>
      <input type="checkbox" id="vista-mare" name="vista-mare">
      <label for="vista-mare">Vista mare</label>
    </li>
  </ul>
</form>
</div>




      <div id="app">

      <my-main :searchedcity= "{{ $data }}" :ciccio= "{{ $apartments }}" :services= "{{$services}}"></my-main>


      <div class="map-box">

      </div>

      </div>








@endsection
