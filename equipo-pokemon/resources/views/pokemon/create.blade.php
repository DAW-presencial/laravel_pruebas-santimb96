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
        <form class="m-4 text-center" action="{{ route('pokemons.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="mb-3">
                <label class="form-label">@lang('NOMBRE')
                    <input class="form-control" type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" required/>
                </label>
            </div>
            <div class="mb-3">
                <label class="form-label">@lang('NIVEL')
                    <input class="form-control" type="number" id="nivel" name="nivel" value="{{ old('nivel') }}" required/>
                </label>
            </div>

            <div class="mb-3">
                <label class="form-label">@lang('CAPTURADO EL DÍA')
                    <input class="form-control" type="date" id="fecha_capturado" name="fecha_capturado"
                           value="{{ old('fecha_capturado') }}" required/>
                </label>
            </div>

            <div class="mb-3">
                <label class="form-label">@lang('TIPO')
                    <input class="form-check-input" type="checkbox" id="poderes1" name="tipo[]" value="acero"
                        {{ (is_array(old('tipo')) and in_array('acero', old('tipo'))) ? 'checked' : '' }} />
                    <label for="poderes1" class="form-check-label">@lang('ACERO')</label>
                    <input class="form-check-input" type="checkbox" id="poderes2" name="tipo[]" value="agua"
                        {{ (is_array(old('tipo')) and in_array('agua', old('tipo'))) ? 'checked' : '' }} />
                    <label for="poderes2" class="form-check-label">@lang('AGUA')</label>
                    <input class="form-check-input" type="checkbox" id="poderes3" name="tipo[]" value="fuego"
                        {{ (is_array(old('tipo')) and in_array('fuego', old('tipo'))) ? 'checked' : '' }} />
                    <label for="poderes3" class="form-check-label">@lang('FUEGO')</label>
                    <input class="form-check-input" type="checkbox" id="poderes3" name="tipo[]" value="volador"
                        {{ (is_array(old('tipo')) and in_array('volador', old('tipo'))) ? 'checked' : '' }} />
                    <label for="poderes3" class="form-check-label">@lang('VOLADOR')</label>
                </label>
            </div>

            <div class="mb-3">
                <div class="mb-3">@lang('GÉNERO')</div>
                <div class="mb-3">
                    <label for="genero1" class="form-check-label">@lang('MASCULINO')</label>
                    <input type="radio" id="genero1" name="genero" value="masculino"
                        {{ old('genero') == 'masculino' ? 'checked': '' }} />
                    <label for="genero2" class="form-check-label">@lang('FEMENINO')</label>
                    <input type="radio" id="genero2" name="genero" value="femenino"
                        {{ old('genero') == 'femenino' ? 'checked': '' }} />
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">@lang('DESCRIPCIÓN')
                    <textarea class="form-control" id="descripcion"
                              name="descripcion" required>{{ old('descripcion') }}</textarea>
                </label>
            </div>

            <div class="mb-3">
                <label class="form-label">@lang('SHINY')
                    <select name="shiny" id="shiny">
                        <option value="true" {{ old('shiny') == 'true' ? 'selected': '' }}>@lang('SÍ')</option>
                        <option value="false" {{ old('shiny') == 'false' ? 'selected': '' }}>@lang('NO')</option>
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
