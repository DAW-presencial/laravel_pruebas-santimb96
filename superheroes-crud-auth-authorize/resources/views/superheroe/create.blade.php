@extends('superheroe.layout')

@section('contenido')

    <form action="" method="post">
        <label>NOMBRE
            <input type="text" id="nombre" name="nombre"/>
        </label>

        <label>EDAD
            <input type="number" id="edad" name="edad"/>
        </label>

        <label>FECHA NACIMIENTO
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento"/>
        </label>

        <label>PODERES
            <input type="checkbox" id="poderes1" name="poderes1" value="VOLAR"/>
            <input type="checkbox" id="poderes2" name="poderes2" value="RAPIDEZ"/>
            <input type="checkbox" id="poderes3" name="poderes3" value="SUPERFUERZA"/>
        </label>

        <label>GÉNERO
            <input type="radio" id="genero1" name="genero1" value="HOMBRE"/>
            <input type="radio" id="genero2" name="genero2" value="MUJER"/>
        </label>

        <label>DESCRIPCIÓN
            <textarea id="descripcion" name="descripcion"></textarea>
        </label>

        <label>VENGADOR
            <select name="vengador" id="vengador">
                <option value="SI">SÍ</option>
                <option value="NO">NO</option>
            </select>
        </label>

        <input type="submit" value="ENVIAR" name="enviar"/>
    </form>
@endsection
