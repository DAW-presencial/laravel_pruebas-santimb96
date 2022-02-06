@extends('superheroe.layout')

@section('contenido')

    <table class="table table-dark table-hover">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">IMG</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">VEHICULO_ID</th>
            <th scope="col">OPCIONES</th>
        </tr>
        </thead>
        <tbody>
        @foreach( $superheroe as $s)
            <tr>
                <th scope="row">{{ $s->id }}</th>
                <th><img src="{{ asset('/storage/image/'.$s->fichero) }}" alt="superheroe" style="width: 40px; height: 50px;"></th>
                <td>{{ $s->nombre }}</td>
                <td>{{ $s->vehiculo_id }}</td>
                <td>
                    <form action="{{ route('home.destroy', $s->id) }}" method="post">
                        @auth
                            <a class="btn btn-info" href="{{ route('home.show', $s->id) }}">Mostrar</a>
                        @endauth
                        @guest
                            <p class="text-danger">Loggueate!</p>
                        @endguest
                            @if( auth()->check())
                                @if( auth()->user()->isAdmin())
                            <a class="btn btn-success" href="{{ route('home.edit', $s->id) }}">Editar</a>
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Borrar</button>
                            @endif
                        @endif
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
