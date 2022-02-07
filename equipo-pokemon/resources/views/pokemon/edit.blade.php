@extends('pokemon.layout')

@section('contenido')

    @php
        //value="{{ old('nombre', $superheroe->nombre ?? '') }}" old value
    @endphp
    @if($errors->any())
        <div class="d-flex justify-content-center align-items-center full-width">
            <table class="table table-dark table-hover text-danger text-center">
                <thead>
                <tr>
                    <th scope="col">Errores</th>
                </tr>
                </thead>
                <tbody>
                @foreach($errors->all() as $e)
                    <tr>
                        <th>{{ $e }}</th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <div class="container d-flex justify-content-center align-items-center">
        <form class="m-4 text-center" action="{{ route('pokemons.update', $pokemon->id) }}" method="post">
            @csrf
            @method('put')
            <h4 class="m-4">Estás editando a: {{ $pokemon->nombre }}</h4>
            <div class="mb-3">
                <label class="form-label">@lang('NOMBRE')
                    <input class="form-control" type="text" id="nombre" name="nombre" value="{{ old('nombre', $pokemon->nombre ?? '') }}" required/>
                </label>
            </div>
            <div class="mb-3">
                <label class="form-label">@lang('NIVEL')
                    <input class="form-control" type="number" id="nivel" name="nivel" value="{{ old('nivel', $pokemon->nivel ?? '') }}" required/>
                </label>
            </div>

            <div class="mb-3">
                <label class="form-label">@lang('CAPTURADO EL DÍA')
                    <input class="form-control" type="date" id="fecha_capturado" name="fecha_capturado" value="{{ old('fecha_capturado', $pokemon->fecha_capturado ?? '') }}" required/>
                </label>
            </div>

            <!-- json_decode($pokemon->tipo)[0] == 'acero' || json_decode($pokemon->tipo)[1] == 'acero -->
            <div class="mb-3">
                <label class="form-label">@lang('TIPO')
                    <input class="form-check-input" type="checkbox" id="poderes1" name="tipo[]" value="acero"
                    {{ in_array('acero', json_decode($pokemon->tipo)) ? 'checked': ''}}/>
                    <label for="poderes1" class="form-check-label">@lang('ACERO')</label>

                    <input class="form-check-input" type="checkbox" id="poderes2" name="tipo[]" value="agua"
                        {{ in_array('agua', json_decode($pokemon->tipo)) ? 'checked': ''}}/>
                    <label for="poderes2" class="form-check-label">@lang('AGUA')</label>

                    <input class="form-check-input" type="checkbox" id="poderes3" name="tipo[]" value="fuego"
                        {{ in_array('fuego', json_decode($pokemon->tipo)) ? 'checked': ''}}/>
                    <label for="poderes3" class="form-check-label">@lang('FUEGO')</label>

                    <input class="form-check-input" type="checkbox" id="poderes3" name="tipo[]" value="volador"
                        {{ in_array('volador', json_decode($pokemon->tipo)) ? 'checked': ''}}/>
                    <label for="poderes3" class="form-check-label">@lang('VOLADOR')</label>
                </label>
            </div>


            <div class="mb-3">
                <div class="mb-3">@lang('GÉNERO')</div>
                <div class="mb-3">
                    <label for="genero1" class="form-check-label">@lang('MASCULINO')</label>
                    <input type="radio" id="genero1" name="genero" value="masculino"
                    {{ $pokemon->genero == 'masculino' ? 'checked': '' }}/>
                    <label for="genero2" class="form-check-label">@lang('FEMENINO')</label>
                    <input type="radio" id="genero2" name="genero" value="femenino"
                        {{ $pokemon->genero == 'femenino' ? 'checked': '' }}/>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">@lang('DESCRIPCIÓN')
                    <textarea class="form-control" id="descripcion" name="descripcion" required>{{ old('descripcion', $pokemon->descripcion ?? '') }}</textarea>
                </label>
            </div>

            <div class="mb-3">
                <label class="form-label">@lang('SHINY')
                    <select name="shiny" id="shiny">
                        <option value="true" {{ $pokemon->shiny == true ? 'selected': '' }}>@lang('SÍ')</option>
                        <option value="false" {{ $pokemon->shiny == false ? 'selected': '' }}>@lang('NO')</option>
                    </select>
                </label>
            </div>

            <label for="formFile" class="form-label">@lang('FICHERO')</label>
            <input class="form-control" type="file" name="fichero" id="formFile">

            <div class="m-3 d-flex justify-content-center align-items-center">
                <input class="btn btn-primary" type="submit" value="@lang('ENVIAR')" name="enviar"/>
            </div>

        </form>
    </div>
@endsection
