@extends('pokemon.layout')

@section('contenido')

    <button class="btn btn-success m-2" onclick="location.href = '{{ route('pokemons.create') }}'">Crear</button>

    <table class="table table-dark table-hover text-center">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">TIPO</th>
            <th scope="col">OPCIONES</th>
        </tr>
        </thead>
        <tbody>
        @foreach( $pokemon as $p)
            <tr>
                <th scope="row">{{ $p->id }}</th>
                <td>{{ $p->nombre }}</td>
                <td>
                    <ul class="list-group">
                        @foreach( json_decode($p->tipo) as $t)
                            <li class="list-group-item list-group-item-dark"> {{ $t }} </li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <form action="{{ route('pokemons.destroy', $p->id) }}" method="post">
                        @auth
                            <a class="btn btn-info" href="{{ route('pokemons.show', $p->id) }}">Mostrar</a>
                        @endauth
                        @guest
                            <p class="text-danger">Loggueate!</p>
                        @endguest
                            <a class="btn btn-success" href="{{ route('pokemons.edit', $p->id) }}">Editar</a>
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
