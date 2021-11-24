@extends('layout')

@section('form')
    <form >
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre">
        <label for="apellido1">Primer apellido</label>
        <input type="text" id="apellido1" name="apellido1">
        <label for="apellido2">Segundo apellido</label>
        <input type="text" id="apellido2" name="apellido2">
        <label for="dni">DNI</label>
        <input type="text" id="dni" name="dni">
        <label for="Teléfono">Teléfono</label>
        <input type="number" id="telefono" name="telefono">
        <label for="email">Correo</label>
        <input type="email" id="correo" name="correo">
    </form>
@endsection
