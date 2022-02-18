@extends('pokemon.layout')
@section('contenido')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <form name="formData" id="form">

                <div class="mb-3">
                <label class="form-label" for="nombre">NOMBRE
                    <input class="form-control" id="nombre" name="nombre" type="text">
                </label>
                </div>
                <div class="mb-3">
                <label class="form-label" for="nivelPokemon">NIVEL
                    <input class="form-control" id="nivelPokemon" name="nivel" type="number">
                </label>
                </div>
                <button class="btn btn-primary col-12" onclick="postData()">Enviar</button>
            </form>
        </div>
    </div>
</div>
@endsection

