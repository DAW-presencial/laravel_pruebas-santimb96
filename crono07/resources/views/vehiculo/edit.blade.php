@extends('vehiculo.layout')

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
        <form class="m-4 text-center" action="{{ route('vehiculo.update', $v->id) }}" method="post">
            @csrf
            @method('put')

            <div class="mb-3">
                <label class="form-label">@lang('NOMBRE')
                    <input class="form-control" type="text" id="nombre" name="nombre" value="{{ old('nombre', $v->nombre ?? '') }}" required/>
                </label>
            </div>
            <div class="mb-3">
                <label class="form-label">@lang('MODELO')
                    <input class="form-control" type="text" id="modelo" name="modelo" value="{{ old('modelo', $v->modelo ?? '') }}" required/>
                </label>
            </div>
            <div class="mb-3">
                <label class="form-label">@lang('COLOR')
                    <input class="form-control" type="text" id="color" name="color" value="{{ old('color', $v->color ?? '') }}" required/>
                </label>
            </div>
            <div class="mb-3">
                <label class="form-label">@lang('KM')
                    <input class="form-control" type="number" id="km" name="km" value="{{ old('km', $v->km ?? '') }}" required/>
                </label>
            </div>


            <div class="m-3 d-flex justify-content-center align-items-center">
                <input class="btn btn-primary" type="submit" value="@lang('ENVIAR')" name="enviar"/>
            </div>

        </form>
    </div>
@endsection
