@extends('layout')


@section('contenido')

    @foreach ($usuario as $usr)
        <ul>
            <li>{{ $usr->id }} </li>
            <li>{{ $usr->nombre }}</li>
            <li>{{ $usr->numero }}</li>
            <li> <a href="edit/{{ $usr->id }}">Editar usuario</a> </li>
            <li> <a href="delete/{{ $usr->id }}">Borrar usuario</a> </li>
        </ul>
    @endforeach
@endsection
