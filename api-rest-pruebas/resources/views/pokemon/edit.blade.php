<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<form name="formData" id="form">

    <label for="nombre">NOMBRE
        <input id="nombre" name="nombre" value="{{ $p->nombre }}" type="text">
    </label>

    <label for="nivelPokemon">NIVEL
        <input id="nivelPokemon" name="nivel" value="{{ $p->nivel }}" type="number">
    </label>

    <button onclick="updateData({{ $p->id }})">Enviar</button>
</form>
<script src="../../js/main.js"></script>
