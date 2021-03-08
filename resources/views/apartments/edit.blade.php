@extends('layouts.app')
@section('content')
<div class="container">
    <div class="jumbotron py-4">
        <h1 class="">Modifica appartamento</h1>
        <hr class="my-3">
        <form method="post" action="{{ route('apartments.update', $apartment) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group mt-3">
                <input type="text" class="form-control" id="title" placeholder="Title" name="title" value='{{ $apartment->title }}'>
            </div>
             
            <div class="form-group">

                <input type="text" class="form-control" id="description" placeholder="Description" name="description" value='{{ $apartment->description }}'>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="rooms" placeholder="Num Rooms" name="rooms" value='{{ $apartment->rooms }}'>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="beds" placeholder="Num Beds" name="beds" value='{{ $apartment->beds }}'>
            </div>                        
            <div class="form-group">
                <input type="text" class="form-control" id="bathrooms" placeholder="Num Bathrooms" name="bathrooms" value='{{ $apartment->bathrooms }}'>
            </div>      
            <div class="form-group">
                <input type="text" class="form-control" id="metri_quadrati" placeholder="Num Mt Qd" name="metri_quadrati" value='{{ $apartment->metri_quadrati }}'>
            </div>       
            <div class="form-group">
                <input type="text" class="form-control" id="price" placeholder="Price" name="price" value='{{ $apartment->price }}'>
            </div>                       
            <div class="form-group">
                <label for="cover">Modifica la Tua Immagine Cover cover</label>
                <input id="cover" type="file" name="cover" value='{{ $apartment->cover }}'>
                <img src="{{asset($apartment->cover_img)}}" alt="cover" width='100'>
            </div>
            <div class="form-group">
                <label for="image">Modifica le immagini del tuo appartamento</label>
                <input id="image" type="file" name="image[]" multiple value='{{ $apartment->imgs }}'>
                <img src="{{asset($apartment->imgs)}}" alt="image" width='100'>
            </div>
            <button type="submit" class="btn btn-dark d-block w-75 mx-auto">Create</button>

@endsection
