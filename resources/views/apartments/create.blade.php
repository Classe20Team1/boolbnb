@extends('layouts.boolbnb')

@section('title')
  Inserisci un nuovo appartamento
@endsection

@section('content')
  <section class="add-edit-container">
    <a href="/admin" class="go-back aptedit-back-link">
      Torna alla Dashboard
    </a>
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
        <div class="add-form-element add-title">
          <div class="title-element">
            <label for="city">Città</label><br>
            <input class="title-box" type="city" id="city" name="city" value="" placeholder="">
          </div>
          <div class="title-element">
            <label for="address">Indirizzo</label><br>
            <input class="address-box" type="address" id="address" name="address" value="" placeholder="Via Risorgimento 1">
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
              <input id="Bathrooms" type="number" name="bathrooms" value="1">
            </li>
            <li class="">
              <label for="metri_quadrati">Metri quadrati (&#13217;)</label>
              <input id="metri_quadrati" type="number" name="metri_quadrati" value="50">
            </li>
          </ul>
        </div>

        <div class="add-form-element">
          <ul class="add-services">
            @foreach($services as $service)
                <div class="add-form-element">
                  <ul class="add-services">
                    <li>
                      <input type="checkbox" name="services[]" value="{{$service->id}}">
                      <label for="services[]">{{$service->name}}</label>
                    </li>
                  </ul>
                </div>
            @endforeach
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
