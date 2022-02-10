@extends('post.layout')

@section('contenido')

    @can('isUser')
        <button class="btn btn-success m-2" onclick="location.href = '{{ route('post.create') }}'">Crear</button>
    @endcan
    <table class="table table-dark table-hover text-center">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">TITULO</th>
            <th scope="col">EXTRACTO</th>
            <th scope="col">CONTENIDO</th>
            <th scope="col">CADUCABLE</th>
            <th scope="col">COMENTABLE</th>
            <th scope="col">ACCESO</th>
            <th scope="col">FECHA DE PUBLICACIÓN</th>
            <th scope="col">OPCIONES</th>
        </tr>
        </thead>
        <tbody>
        @foreach( $post as $p)
            <tr>
                <th scope="row">{{ $p->id }}</th>
                <td>{{ $p->titulo }}</td>
                <td>{{ $p->extracto }}</td>
                <td>{{ $p->contenido }}</td>
                <td>{{ $p->caducable ? 'Sí': 'No'}}</td>
                <td>{{ $p->comentable ? 'Sí': 'No'}}</td>
                <td>{{ $p->acceso }}</td>
                <td>{{ $p->fecha_publicacion }}</td>

                <td>
                    <form action="{{ route('post.destroy', $p->id) }}" method="post">

{{--                        <a class="btn btn-info" href="{{ route('post.show', $p->id) }}">Mostrar</a>--}}
                        @can('isUser')
                            <a class="btn btn-success" href="{{ route('post.edit', $p->id) }}">Editar</a>
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
