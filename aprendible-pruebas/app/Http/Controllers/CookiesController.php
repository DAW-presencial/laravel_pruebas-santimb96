<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CookiesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return string
     */
    public function __invoke(Request $request): string
    {
        global $output;
/*
        if (isset($_COOKIE["cookie"]) && $_COOKIE["cookie"] != 11 ) {

            setcookie("cookie", $_COOKIE["cookie"] = ++ $_COOKIE["cookie"]);
            $output = "Llevas " . $_COOKIE["cookie"] . " visitas!";

        } else if ($_COOKIE["cookie"] == 11){

            setcookie("cookie", 1);
            $output = "Bienvenido!";

        } else {

            $output = "Bienvenido!";
            setcookie("cookie", 1);

        }*/

        return $output;
    }

    public function obtenerCookies($indice = 0): string
    {

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

        return $output;

    }

    public function vistaCookies($indice = 0){

        return view('cookie', compact('indice'));

    }
}
