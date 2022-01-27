<html lang="en">
<head>
    <title>Superhéroes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div>
    <h1 class="text-center m-4">SUPERHÉROES</h1>

    <a href="{{ route('home.create') }}">Crear superhéroe</a>

    @yield('contenido')
</div>
</body>
</html>
