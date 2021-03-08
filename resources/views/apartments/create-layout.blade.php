@extends('layouts.boolbnb')

@section('title')
  Inserisci un nuovo appartamento
@endsection

@section('content')
  <section class="add-edit-container">
    <div class="add-title-container">

    </div>
    <div class="add-form-container">
      <form class="" action="{{route('apartments.store')}}" method="post" enctype="multipart/form-data">
      @csrf
      @method('Post')

        <h2>Nuovo appartamento</h2>
        <div class="add-form-element add-title">
          <div class="title-element">
            <label for="title">Nome</label><br>
            <input class="title-box" type="text" id="title" name="title" value="" placeholder="">
          </div>
          <div class="price-element">
            <label for="price">Prezzo</label><br>
            <input id="price" type="text" name="price" value="">
          </div>
        </div>

        <div class="add-form-element">
          <label for="description">Descrizione</label><br>
          <textarea id="description" name="description" rows="8" cols="60"></textarea>
        </div>

        <div class="add-form-element">
          <ul class="add-basics-info">
            <li class="">
              <label for="beds">Letti</label>
              <input id="beds" type="number" name="beds" value="1">
            </li>
            <li class="">
              <label for="rooms">Camere</label>
              <input id="rooms" type="number" name="rooms" value="1" min="1">
            </li>
            <li class="">
              <label for="Bathrooms">Bagni</label>
              <input id="Bathrooms" type="number" name="Bathrooms" value="1">
            </li>
            <li class="">
              <label for="metri_quadrati">Metri quadrati (&#13217;)</label>
              <input id="metri_quadrati" type="number" name="metri_quadrati" value="50">
            </li>
          </ul>
        </div>

        <div class="add-form-element">
          <ul class="add-services">
            <li>
              <input id="wifi" type="checkbox" name="wifi" value="wifi">
              <label for="wifi">Wi-Fi</label>
            </li>
            <li>
              <input id="posto_macchina" type="checkbox" name="posto_macchina" value="posto_macchina">
              <label for="posto_macchina">Posto macchina</label>
            </li>
            <li>
              <input id="piscina" type="checkbox" name="piscina" value="piscina">
              <label for="piscina">Piscina</label>
            </li>
            <li>
              <input id="portineria" type="checkbox" name="portineria" value="portineria">
              <label for="portineria">Portineria</label>
            </li>
            <li>
              <input id="sauna" type="checkbox" name="sauna" value="sauna">
              <label for="sauna">Sauna</label>
            </li>
            <li>
              <input id="vista_mare" type="checkbox" name="vista_mare" value="vista_mare">
              <label for="vista_mare">Vista mare</label>
            </li>
          </ul>
        </div>
        <div class="add-img">
          <div class="">
            <label for="cover">Carica immagina di anteprima</label><br>
            <input id="cover" type="file" name="cover" value="">
          </div>
          <div class="">
            <label for="image">Carica immagini</label><br>
            <input id="image" type="file" name="image[]" multiple>
          </div>
        </div>
        <div class="submit-form-btn">
          <input type="submit" name="submit" value="Aggiungi">
        </div>
      </form>
    </div>

  </section>
@endsection
