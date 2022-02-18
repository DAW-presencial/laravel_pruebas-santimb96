@extends('pokemon.layout')

@section('contenido')
    <button class="btn btn-success" onclick="location.href = '{{ route('pokemons.create') }}'">Crear</button>

    <div id="pokemon"></div>

    <script>
        window.onload = function () {
            pintarPokemon();
        }
    </script>
@endsection

