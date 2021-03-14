@extends('layouts.boolbnb')

@section('title')
  Advanced Search
@endsection

@section('content')

                    <!-- @if (session()->has('success_message'))
                    <div class="alert alert-success">
                        {{ session()->get('success_message') }}
                    </div>
                @endif

                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif -->


      <div id="payments">

            <payments :appartamento="{{$apartment}}" :sponsortypes="{{$sponsortypes}}"> </payments>

      </div>

      <div class="blade-button-success-container">

            <a class="blade-button-success" href="{{route('apartments.index')}}">Torna alla lista dei tuoi appartamenti</a>

      </div>







@endsection
