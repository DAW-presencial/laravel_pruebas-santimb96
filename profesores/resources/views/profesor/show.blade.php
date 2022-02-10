@extends('profesor.layout')

@section('contenido')
    <h1>{{ __('prueba.Hola Mundo') }}</h1>
    <table class="table table-dark table-hover">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">ASIGNATURA</th>
            <th scope="col">CONTRATO</th>
            <th scope="col">ALUMNOS</th>
            <th scope="col">OPCIONES</th>
        </tr>
        </thead>
        <tbody>
        @foreach( $profesor as $p)
            <tr>

                <td>{{ $p->id }}</td>
                <td>{{ $p->nombre }}</td>
                <td>{{ $p->asignatura }}</td>
                <td>{{ $p->contrato ? 'SÍ': 'NO' }}</td>
                <td>
                    <ul class="list-group">
                        @foreach( $alumnos as $a)
                            <li class="list-group-item list-group-item-dark"> {{ $a->nombre }} </li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <form action="{{ route('profesor.destroy', $p->id) }}" method="post">
                        @can('isAdmin')
                            <a class="btn btn-success" href="{{ route('profesor.edit', $p->id) }}">Editar</a>
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
        <button class="btn btn-primary" onclick="location.href = '{{ route('profesor.index') }}'">Atrás</button>
    </div>
@endsection
