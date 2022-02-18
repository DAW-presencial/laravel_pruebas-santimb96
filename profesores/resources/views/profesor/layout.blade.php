<html lang="en">
<head>
    <title>Profesores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="bg-dark text-light">
<div>
    <form action="{{ route('register') }}" method="get">
        @csrf
        <button type="submit" class="btn btn-success">
            Register
        </button>
    </form>
    <form action="{{ route('login') }}" method="get">
        @csrf
        <button type="submit" class="btn btn-primary">
            Login
        </button>
    </form>
    @if(Auth::user() !== null)
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Logout
            </button>
        </form>
    @endif

    <form action='lenguaje' method="post">
        @csrf
        @method( 'POST' )
        <div class="mb-3">
                <input type="submit" value="en" name="lengua" id="lengua"/>
                <input type="submit" value="es" name="lengua" id="lengua"/>
        </div>
    </form>

    <div class="container d-flex justify-content-center align-items-center mt-4 mb-4">
    <!--<img src="{{ URL::asset('/assets/marvel.png') }}" alt="marvel" style="width: 100px; height: 100px;"/>-->
        <h1 class="text-center m-4">Profesores y sus alumnos</h1>
    </div>

    @if( $_SERVER['REQUEST_URI'] !== "/profesor" )
        <button class="btn btn-primary m-2" onclick="location.href = '{{ route('profesor.index') }}'">Home</button>
    @endif

    @yield('contenido')
</div>
</body>
</html>
