<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<form name="formData" id="form">

    <label for="nombre">NOMBRE
        <input id="nombre" name="nombre" type="text">
    </label>

    <label for="nivelPokemon">NIVEL
        <input id="nivelPokemon" name="nivel" type="number">
    </label>

    <button onclick="postData()">Enviar</button>
</form>

<script src="../js/main.js">

</script>
