<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <ul>
        @foreach($apartments as $apartment)
    
        <li>
        
            <img src="{{ $apartment->cover_img }}" alt="cover">
            <h1>

                {{ $apartment->title }}
            </h1>
            <h4>
                {{ $apartment->user->username }}
            </h4>
            <h6>
                {{ $apartment->user->info->address }}
            </h6>
            <p>
                {{ $apartment->description }}
            </p>
            <form method="post" class="d-inline"action="{{route('apartment.destroy', $apartment->id)}}">
                @csrf
                @method('delete')
                <input type="submit" class="btn btn-outline-danger" value="Elimina">
            </form>
        </li>
        
    
        @endforeach

    </ul>
</body>
</html>