<html lang="en">
<head>
    <title>Superhéroes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="bg-dark text-light">
<div>
    <h1 class="text-center m-4">SUPERHÉROES</h1>

    @if( $_SERVER['REQUEST_URI'] !== "/home" )
        <button class="btn btn-primary m-2" onclick="location.href = '{{ route('home.index') }}'">Home</button>
    @endif

    <button class="btn btn-success m-2" onclick="location.href = '{{ route('home.create') }}'">Crear</button>



    @yield('contenido')
</div>
</body>
</html>
