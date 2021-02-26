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
            <h1>

                https://a0.muscache.com/im/pictures/80ac6baf-ea77-4d14-bbb7-c91a4230b20a.jpg
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

        </li>
    
        @endforeach

    </ul>
</body>
</html>