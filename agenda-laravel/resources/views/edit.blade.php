@extends('layout')

@section('contenido')


    <form action='update/{{ $usuario->id }}' method="post">
        @csrf
        @method('put')
        <label for="nombre">NOMBRE</label>
        <input type="text" id="nombre" name="nombre" value="{{ $usuario->nombre }}">

        <label for="numero">NUMERO</label>
        <input type="text" id="numero" name="numero" value="{{ $usuario->numero }}">

        <input type="submit" id="enviar" name="enviar" value="Enviar">
    </form>

@endsection
