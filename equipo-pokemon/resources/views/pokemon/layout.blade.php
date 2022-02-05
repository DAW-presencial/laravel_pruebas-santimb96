<html lang="en">
<head>
    <title>Pokémons</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="bg-dark text-light">
<div>
    <div class="container d-flex justify-content-center align-items-center mt-4 mb-4">
        <!--<img src="{{ URL::asset('/assets/marvel.png') }}" alt="marvel" style="width: 100px; height: 100px;"/>-->
        <h1 class="text-center m-4">POKÉMONS</h1>
    </div>

    @if( $_SERVER['REQUEST_URI'] !== "/pokemons" )
        <button class="btn btn-primary m-2" onclick="location.href = '{{ route('pokemons.index') }}'">Home</button>
    @endif

    @yield('contenido')
</div>
</body>
</html>
