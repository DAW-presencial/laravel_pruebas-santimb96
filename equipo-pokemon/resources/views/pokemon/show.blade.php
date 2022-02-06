@extends('pokemon.layout')

@section('contenido')
    <table class="table table-dark table-hover">
        <thead>
        <tr>
            <th scope="col">NOMBRE</th>
            <th scope="col">NIVEL</th>
            <th scope="col">CAPTURADO EN</th>
            <th scope="col">TIPO</th>
            <th scope="col">GÉNERO</th>
            <th scope="col">DESCRIPCIÓN</th>
            <th scope="col">SHINY</th>
            <th scope="col">OPCIONES</th>
        </tr>
        </thead>
        <tbody>
        @foreach( $pokemon as $p)
            <tr>

                <td>{{ $p->nombre }}</td>
                <td>{{ $p->nivel }}</td>
                <td>{{ $p->fecha_capturado }}</td>
                <td>
                    <ul class="list-group">
                        @foreach( json_decode($p->tipo) as $t)
                            <li class="list-group-item list-group-item-dark"> {{ $t }} </li>
                        @endforeach
                    </ul>
                </td>
                <td>{{ $p->genero }}</td>
                <td>{{ $p->descripcion }}</td>
                <td>{{ $p->shiny ? 'SÍ': 'NO' }}</td>
                <td>
                    <form action="{{ route('pokemons.destroy', $p->id) }}" method="post">
                        @can('isAdmin')
                            <a class="btn btn-success" href="{{ route('pokemons.edit', $p->id) }}">Editar</a>
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Borrar</button>
                        @else
                            <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
                        @endcan
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center align-items-center">
        <button class="btn btn-primary" onclick="location.href = '{{ route('pokemons.index') }}'">Atrás</button>
    </div>
@endsection
