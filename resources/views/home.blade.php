<!DOCTYPE html>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mi primera vista</title>
</head>
<body>
    <h1>Hola mundo Laravel  -  {{"Hola mundo $nombre $apellido"}}</h1>
<ul>
    @isset($nombres)
     Si esta definido y no es null
    @endisset
    @empty($nombres)
     sii, esta vacio
    @endempty
@forelse( $nombres as $nom)
    <li>
        @if ($loop->first)
            Primero: 
            @elseif ($loop->last)
                Ultimo: 
           @else
           En medio:
        @endif

        {{$nom}} 
            </li>
            @empty
            <li>{{"Vacio"}}</li>


@endforelse
</ul>

</body>


</html>