@extends('layout')


@section('contenido')

    @foreach ($usuario as $usr)
        <ul>
            <li>{{ $usr->id }}</li>
            <li>{{ $usr->nombre }}</li>
            <li>{{ $usr->numero }}</li>
        </ul>
    @endforeach
@endsection
