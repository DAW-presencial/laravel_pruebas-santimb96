<html lang="es">
<head>
</head>
<body>

@php

$render = "<ul>";


foreach ($paises as $pais){
    $render.= "<h1>".strtoupper($pais->nombre)."</h1>";
    $render.= "<li>$pais->codigoISO3</li>
    <li>$pais->codigoISO2</li>
    <li>$pais->cod_numerico</li>";
}

$render.= "</ul>";

echo $render;

/**
  <div>
        <ul>
            <li>{{ $paises->codigoISO3 }}</li>
            <li>{{ $paises->codigoISO2 }}</li>
            <li>{{ $paises->cod_numerico }}</li>
            <li>{{ $paises->nombre }}</li>
        </ul>
    </div>
**/

@endphp
</body>
</html>
