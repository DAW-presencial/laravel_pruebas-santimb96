@extends('pokemon.layout')

@section('contenido')
    <div id="pokemon"></div>
    <script>
        window.onload = function(){
            showData({{ $id }});
        }
    </script>
@endsection
