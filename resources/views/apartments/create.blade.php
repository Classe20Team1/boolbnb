@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <h2 class="card-header w-100 m-1 text-center">Aggiungi il tuo Appartamento</h2>
    </div>
    <div class="row justify-content-center">
        <form method="post" action="{{ route('apartments.store')}}" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="form-group mt-3">
                <input type="text" class="form-control" id="title" placeholder="Title" name="title">
            </div>
             
            <div class="form-group">

                <input type="text" class="form-control" id="description" placeholder="Description" name="description">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="rooms" placeholder="Num Rooms" name="rooms">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="beds" placeholder="Num Beds" name="beds">
            </div>                        
            <div class="form-group">
                <input type="text" class="form-control" id="bathrooms" placeholder="Num Bathrooms" name="bathrooms">
            </div>      
            <div class="form-group">
                <input type="text" class="form-control" id="metri_quadrati" placeholder="Num Mt Qd" name="metri_quadrati">
            </div>       
            <div class="form-group">
                <input type="text" class="form-control" id="price" placeholder="Price" name="price">
            </div>                       
            <div class="form-group">
                <label for="cover">Scegli la tua Immagine cover</label>
                <input id="cover" type="file" name="cover">
            </div>
            <div class="form-group">
                <label for="image">Scegli la tua Immagine</label>
                <input id="image" type="file" name="image[]" multiple>
            </div>
          
            
            <button type="submit" class="btn btn-dark d-block w-75 mx-auto">Create</button>
        </form>
    </div>
</div>
@endsection