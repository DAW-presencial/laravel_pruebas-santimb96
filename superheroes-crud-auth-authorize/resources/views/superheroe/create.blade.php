@extends('superheroe.layout')

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
        <form class="m-4 text-center" action="{{ route('home.store') }}" method="post">
            @csrf
            @method('POST')
            <div class="mb-3">
                <label class="form-label">@lang('NOMBRE')
                    <input class="form-control" type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" required/>
                </label>
            </div>
            <div class="mb-3">
                <label class="form-label">@lang('EDAD')
                    <input class="form-control" type="number" id="edad" name="edad" value="{{ old('edad') }} required"/>
                </label>
            </div>

            <div class="mb-3">
                <label class="form-label">@lang('FECHA DE NACIMIENTO')
                    <input class="form-control" type="date" id="fecha_nacimiento" name="fecha_nacimiento"
                           value="{{ old('fecha_nacimiento') }}" required/>
                </label>
            </div>

            <div class="mb-3">
                <label class="form-label">@lang('PODERES')
                    <input class="form-check-input" type="checkbox" id="poderes1" name="poderes[]" value="volar"
                        {{ (is_array(old('poderes')) and in_array('volar', old('poderes'))) ? 'checked' : '' }} />
                    <label for="poderes1" class="form-check-label">@lang('VOLAR')</label>
                    <input class="form-check-input" type="checkbox" id="poderes2" name="poderes[]" value="rapidez"
                        {{ (is_array(old('poderes')) and in_array('rapidez', old('poderes'))) ? 'checked' : '' }} />
                    <label for="poderes2" class="form-check-label">@lang('RAPIDEZ')</label>
                    <input class="form-check-input" type="checkbox" id="poderes3" name="poderes[]" value="superfuerza"
                        {{ (is_array(old('poderes')) and in_array('superfuerza', old('poderes'))) ? 'checked' : '' }} />
                    <label for="poderes3" class="form-check-label">@lang('SUPERFUERZA')</label>
                </label>
            </div>

            <div class="mb-3">
                <div class="mb-3">@lang('GÉNERO')</div>
                <div class="mb-3">
                    <label for="genero1" class="form-check-label">@lang('HOMBRE')</label>
                    <input type="radio" id="genero1" name="genero" value="hombre"
                        {{ old('genero') == 'hombre' ? 'checked': '' }} />
                    <label for="genero2" class="form-check-label">@lang('MUJER')</label>
                    <input type="radio" id="genero2" name="genero" value="mujer"
                        {{ old('genero') == 'mujer' ? 'checked': '' }} />
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">@lang('DESCRIPCIÓN')
                    <textarea class="form-control" id="descripcion"
                              name="descripcion" required>{{ old('descripcion') }}</textarea>
                </label>
            </div>

            <div class="mb-3">
                <label class="form-label">@lang('VENGADOR')
                    <select name="vengador" id="vengador">
                        <option value="si" {{ old('vengador') == 'si' ? 'selected': '' }}>@lang('SÍ')</option>
                        <option value="no" {{ old('vengador') == 'no' ? 'selected': '' }}>@lang('NO')</option>
                    </select>
                </label>
            </div>

            <div class="m-3 d-flex justify-content-center align-items-center">
                <input class="btn btn-primary" type="submit" value="@lang('ENVIAR')" name="enviar"/>
            </div>

        </form>
    </div>
@endsection
