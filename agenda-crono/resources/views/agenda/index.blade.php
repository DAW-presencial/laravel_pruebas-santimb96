@extends('agenda.layout')

@section('contenido')
    @can('create', $newAgenda)
    <button class="btn btn-success m-2" onclick="location.href = '{{ route('agenda.create') }}'">Crear</button>
    @endcan
    <table class="table table-dark table-hover">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">EDAD</th>
            <th scope="col">GÉNERO</th>
            <th scope="col">FECHA DE NACIMIENTO</th>
            <th class="col">OPCIONES</th>
        </tr>
        </thead>
        <tbody>
        @foreach( $contacto as $c)
            <tr>
                <th scope="row">{{ $c->id }}</th>
                <td>{{ $c->nombre }}</td>
                <td>{{ $c->edad }}</td>
                <td>{{ $c->genero }}</td>
                <td>{{ $c->fdn }}</td>
                <td>
                    <form action="{{ route('agenda.destroy', $c->id) }}" method="post">

                            <a class="btn btn-info" href="{{ route('agenda.show', $c->id) }}">Mostrar</a>

                                <a class="btn btn-success" href="{{ route('agenda.edit', $c->id) }}">Editar</a>
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
