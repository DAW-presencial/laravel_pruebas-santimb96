@extends('agenda.layout')

@section('contenido')
    {{--    @if($errors->any())
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
        @endif--}}

    <div class="container d-flex justify-content-center align-items-center">


        <form class="m-4 text-center" action="{{ route('agenda.update', $contacto->id) }}" method="post">
            @csrf
            @method('PUT')
            <div>
                <h1 class="text-center">Estás editando a {{ $contacto->nombre }}</h1>
            </div>
            <div class="mb-3">
                <label class="form-label">@lang('NOMBRE')
                    <input class="form-control" type="text" id="nombre" name="nombre" value="{{ old('nombre', $contacto->nombre ?? '') }}" required/>
                </label>
            </div>
            <div class="mb-3">
                <label class="form-label">@lang('EDAD')
                    <input class="form-control" type="number" id="edad" name="edad" value="{{ old('edad', $contacto->edad ?? '') }}" required/>
                </label>
            </div>

            <div class="mb-3">
                <label class="form-label">@lang('GÉNERO')
                    <select name="genero" id="genero">
                        <option value="masculino" {{ $contacto->genero == 'masculino' ? 'selected': '' }}>@lang('MASCULINO')</option>
                        <option value="femenino" {{ $contacto->genero == 'femenino' ? 'selected': '' }}>@lang('FEMENINO')</option>
                    </select>
                </label>
            </div>

            <div class="mb-3">
                <label class="form-label">@lang('FECHA DE NACIMIENTO')
                    <input class="form-control" type="date" id="fdn" name="fdn"
                           value="{{ old('fdn', $contacto->fdn ?? '') }}" required/>
                </label>
            </div>

            <div class="m-3 d-flex justify-content-center align-items-center">
                <input class="btn btn-primary" type="submit" value="@lang('ENVIAR')" name="enviar"/>
            </div>

        </form>

    </div>
@endsection
