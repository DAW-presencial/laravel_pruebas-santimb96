@extends('superheroe.layout')

@section('contenido')

    @php
        //value="{{ old('nombre', $superheroe->nombre ?? '') }}" old value
    @endphp

    <div class="container d-flex justify-content-center align-items-center">
        <form class="m-4" action="{{ route('home.update', $superheroe->id) }}" method="post">
            @csrf
            @method('put')
            <div class="mb-3">
                <label class="form-label">NOMBRE
                    <input class="form-control" type="text" id="nombre" name="nombre"/>
                </label>
            </div>
            <div class="mb-3">
                <label class="form-label">EDAD
                    <input class="form-control" type="number" id="edad" name="edad"/>
                </label>
            </div>

            <div class="mb-3">
                <label class="form-label">FECHA NACIMIENTO
                    <input class="form-control" type="date" id="fecha_nacimiento" name="fecha_nacimiento"/>
                </label>
            </div>

            <div class="mb-3">
                <label class="form-label">PODERES
                    <input class="form-check-input" type="checkbox" id="poderes1" name="poderes" value="volar"/>
                    <label for="poderes1" class="form-check-label">Volar</label>
                    <input class="form-check-input" type="checkbox" id="poderes2" name="poderes" value="rapidez"/>
                    <label for="poderes2" class="form-check-label">Rapidez</label>
                    <input class="form-check-input" type="checkbox" id="poderes3" name="poderes" value="superfuerza"/>
                    <label for="poderes3" class="form-check-label">Superfuerza</label>
                </label>
            </div>

            <div class="mb-3">
                <div class="mb-3">GÉNERO</div>
                <div class="mb-3">
                    <label for="genero1" class="form-check-label">Hombre</label>
                    <input type="radio" id="genero1" name="genero" value="hombre"/>
                    <label for="genero2" class="form-check-label">Mujer</label>
                    <input type="radio" id="genero2" name="genero" value="mujer"/>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">DESCRIPCIÓN
                    <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                </label>
            </div>

            <div class="mb-3">
                <label class="form-label">VENGADOR
                    <select name="vengador" id="vengador">
                        <option value="SI">SÍ</option>
                        <option value="NO">NO</option>
                    </select>
                </label>
            </div>

            <div class="m-3 d-flex justify-content-center align-items-center">
                <input class="btn btn-primary" type="submit" value="ENVIAR" name="enviar"/>
            </div>

        </form>
    </div>
@endsection
