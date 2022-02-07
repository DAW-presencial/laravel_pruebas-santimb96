@extends('layout')

@section('cookie')



@php


global $output;


if( $indice > 0 ) $_COOKIE["cookie"] = $indice;

if (isset($_COOKIE["cookie"])) {

    ++$_COOKIE["cookie"];
    setcookie("cookie", $_COOKIE["cookie"]);
    $output = "Llevas " . $_COOKIE["cookie"] . " visitas!";

} else {

    $output = "Bienvenido!";
    setcookie("cookie", 1);

}

echo $output;



@endphp



@endsection
