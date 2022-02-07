@extends('vehiculo.layout')

@section('contenido')

    @can('isAdmin')
        <button class="btn btn-success m-2" onclick="location.href = '{{ route('vehiculo.create') }}'">Crear</button>
    @endcan
    <table class="table table-dark table-hover text-center">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">OPCIONES</th>
        </tr>
        </thead>
        <tbody>
        @foreach( $vehiculo as $v)
            <tr>
                <th scope="row">{{ $v->id }}</th>
                <td>{{ $v->nombre }}</td>
                <td>
                    <form action="{{ route('vehiculo.destroy', $v->id) }}" method="post">

                        <a class="btn btn-info" href="{{ route('vehiculo.show', $v->id) }}">Mostrar</a>
                        @can('isAdmin')
                            <a class="btn btn-success" href="{{ route('vehiculo.edit', $v->id) }}">Editar</a>
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
@endsection
