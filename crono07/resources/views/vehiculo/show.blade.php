@extends('vehiculo.layout')

@section('contenido')
    <table class="table table-dark table-hover">
        <thead>
        <tr>
            <th scope="col">NOMBRE</th>
            <th scope="col">MODELO</th>
            <th scope="col">COLOR</th>
            <th scope="col">KM</th>
            <th scope="col">PROPIETARIO</th>
            <th scope="col">OPCIONES</th>
        </tr>
        </thead>
        <tbody>
        @foreach( $vehiculo as $v)
            <tr>
                <td>{{ $v->nombre }}</td>
                <td>{{ $v->modelo }}</td>
                <td>{{ $v->color }}</td>
                <td>{{ $v->km }}</td>
                <td>{{ $user->name }}</td>
                <td>
                    <form action="{{ route('vehiculo.destroy', $v->id) }}" method="post">
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
    <div class="d-flex justify-content-center align-items-center">
        <button class="btn btn-primary" onclick="location.href = '{{ route('vehiculo.index') }}'">Atrás</button>
    </div>
@endsection
