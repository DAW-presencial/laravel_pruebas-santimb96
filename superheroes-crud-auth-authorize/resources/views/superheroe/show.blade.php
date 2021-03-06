@extends('superheroe.layout')

@section('contenido')
    <h1>SUPER</h1>
    <table class="table table-dark table-hover">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">EDAD</th>
            <th scope="col">FECHA DE NACIMIENTO</th>
            <th scope="col">PODERES</th>
            <th scope="col">GÉNERO</th>
            <th scope="col">DESCRIPCIÓN</th>
            <th scope="col">VENGADOR</th>
            <th scope="col">OPCIONES</th>
        </tr>
        </thead>
        <tbody>
        @foreach( $superheroe as $s)
            <tr>
                <th scope="row">{{ $s->id }}</th>
                <td>{{ $s->nombre }}</td>
                <td>{{ $s->edad }}</td>
                <td>{{ $s->fecha_nacimiento }}</td>
                <td>
                    <ul class="list-group">
                        @foreach( json_decode($s->poderes) as $poder)
                            <li class="list-group-item list-group-item-dark"> {{ $poder }} </li>
                        @endforeach
                    </ul>
                </td>
                <td>{{ $s->genero }}</td>
                <td>{{ $s->descripcion }}</td>
                <td>{{ $s->vengador }}</td>
                <td>
                    <form action="{{ route('home.destroy', $s->id) }}" method="post">
                        <a class="btn btn-success" href="{{ route('home.edit', $s->id) }}">Editar</a>
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center align-items-center">
        <button class="btn btn-primary" onclick="location.href = '{{ route('home.index') }}'">Atrás</button>
    </div>
@endsection
