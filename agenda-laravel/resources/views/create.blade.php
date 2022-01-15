@extends('layout')

@section('contenido')

<form action={{ route('store') }} method="post">
    @csrf

    <label for="nombre">NOMBRE</label>
    <input type="text" id="nombre" name="nombre">

    <label for="numero">NUMERO</label>
    <input type="text" id="numero" name="numero">

    <input type="submit" id="enviar" name="enviar" value="Enviar">
</form>

@endsection
