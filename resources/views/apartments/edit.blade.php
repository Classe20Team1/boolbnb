@extends('layouts.boolbnb')

@section('title')
  Inserisci un nuovo appartamento
@endsection

@section('content')
  <section class="add-edit-container">
    <div class="add-title-container">
      <a href="{{route('apartments.index')}}" class="go-back aptedit-back-link">
        Torna alla lista dei tuoi appartamenti
      </a>
    </div>
    <div class="add-form-container">
      <form class="" action="{{route('apartments.update', $apartment->id)}}" method="post" enctype="multipart/form-data">
      @csrf
      @method('Put')

        <h2>Modifica appartamento</h2>
        <div class="add-form-element add-title">
          <div class="title-element">
            <label for="title">Nome</label><br>
            <input class="title-box" required type="text" id="title" name="title" value="{{ $apartment->title }}" placeholder="">
            @error('title')
              <span class="" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="price-element">
            <label for="price">Prezzo</label><br>
            <input id="price" required type="text" name="price" value="{{$apartment->price}}">
            @error('price')
              <span class="" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>

        <div class="add-form-element">
          <label for="description">Descrizione</label><br>
          <textarea id="description" required value='{{$apartment->description}}' name="description" rows="8" cols="60">{{$apartment->description}}</textarea>
          @error('description')
              <span class="" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>
        <div class="add-form-element add-title">
          <div class="title-element">
            <label for="city">Città</label><br>
            <input class="title-box"  type="city" id="city" name="city" value="" placeholder="">
            
          </div>
          <div class="title-element">
            <label for="address">Indirizzo</label><br>
            <input class="title-box"  type="address" id="address" name="address" value="" placeholder="Via Risorgimento 1">
            
          </div>
        </div>

        <div class="add-form-element">
          <ul class="add-basics-info">
            <li class="">
              <label for="beds">Letti</label>
              <input id="beds" required type="number" name="beds" value="{{$apartment->beds}}">
              @error('beds')
              <span class="" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            </li>
            <li class="">
              <label for="rooms">Camere</label>
              <input id="rooms" required type="number" name="rooms" value="{{$apartment->rooms}}" min="1">
              @error('rooms')
              <span class="" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            </li>
            <li class="">
              <label for="Bathrooms">Bagni</label>
              <input id="Bathrooms" required type="number" name="bathrooms" value="{{$apartment->bathrooms}}">
              @error('bathrooms')
              <span class="" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            </li>
            <li class="">
              <label for="metri_quadrati">Metri quadrati (&#13217;)</label>
              <input id="metri_quadrati" required type="number" name="metri_quadrati" value="{{$apartment->metri_quadrati}}">
              @error('metri_quadrati')
              <span class="" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            </li>
          </ul>
        </div>
        <div class="add-form-element">
          <ul class="add-services">
          @foreach($services as $service)


                  <li>
                    <input type="checkbox" name="services[]" value="{{$service->id}}" {{ $apartment->services->contains($service) ? 'checked' : '' }}>
                    <label for="services[]">{{$service->name}}</label>
                  </li>


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
