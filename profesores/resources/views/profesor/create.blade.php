@extends('profesor.layout')

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
        <form class="m-4 text-center" action="{{ route('profesor.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="mb-3">
                <label class="form-label">@lang('NOMBRE')
                    <input class="form-control" type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" required/>
                </label>
            </div>

            <div class="mb-3">
                <label class="form-label">@lang('ASIGNATURA')
                    <input class="form-control" type="text" id="asignatura" name="asignatura" value="{{ old('asignatura') }}" required/>
                </label>
            </div>

            <div class="mb-3">
                <label class="form-label">@lang('CONTRATO')
                    <select name="contrato" id="contrato">
                        <option value="true" {{ old('contrato') == 'true' ? 'selected': '' }}>@lang('SÍ')</option>
                        <option value="false" {{ old('contrato') == 'false' ? 'selected': '' }}>@lang('NO')</option>
                    </select>
                </label>
            </div>


            <div class="m-3 d-flex justify-content-center align-items-center">
                <input class="btn btn-primary" type="submit" value="@lang('ENVIAR')" name="enviar"/>
            </div>

        </form>
    </div>
@endsection
