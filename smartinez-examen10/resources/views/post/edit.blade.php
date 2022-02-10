@extends('post.layout')

@section('contenido')

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
        <form class="m-4 text-center" action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">{{ __('labels.TÍTULO') }}
                    <input class="form-control" type="text" id="titulo" name="titulo" value="{{ old('titulo', $post->titulo ?? '') }}" required/>
                </label>
            </div>
            <div class="mb-3">
                <label class="form-label">{{ __('labels.EXTRACTO') }}
                    <input class="form-control" type="text" id="extracto" name="extracto" value="{{ old('extracto', $post->extracto ?? '') }}"/>
                </label>
            </div>

            <div class="mb-3">
                <label class="form-label">{{ __('labels.CONTENIDO') }}
                    <textarea class="form-control" id="contenido"
                              name="contenido" required>{{ old('contenido', $post->contenido ?? '') }}</textarea>
                </label>
            </div>

            <div class="mb-3">
                <label class="form-label">@lang('CADUCABLE')
                    <input class="form-check-input" type="checkbox" id="caducable" name="caducable" value="true"/> />
                    <label for="caducable1" class="form-check-label"></label>
                </label>
            </div>

            <div class="mb-3">
                <label class="form-label">@lang('COMENTABLE')
                    <input class="form-check-input" type="checkbox" id="comentable" name="comentable" value="true"
                        /> />
                    <label for="caducable1" class="form-check-label"></label>
                </label>
            </div>


            <div class="mb-3">
                <label class="form-label">@lang('ACCESO')
                    <select name="acceso" id="acceso">
                        <option value="privado" {{ $post->acceso == 'privado' ? 'selected': '' }}>@lang('PRIVADO')</option>
                        <option value="publico" {{ $post->acceso == 'publico' ? 'selected': '' }}>@lang('PÚBLICO')</option>
                    </select>
                </label>
            </div>

            <div class="mb-3">
                <label class="form-label">@lang('FECHA DE PUBLICACIÓN')
                    <input class="form-control" type="date" id="fecha_publicacion" name="fecha_publicacion"
                           value="{{ old('fecha_publicacion', $post->fecha_publicacion ?? '') }}" required/>
                </label>
            </div>

            <div class="m-3 d-flex justify-content-center align-items-center">
                <input class="btn btn-primary" type="submit" value="@lang('ENVIAR')" name="enviar"/>
            </div>

        </form>
    </div>
@endsection
