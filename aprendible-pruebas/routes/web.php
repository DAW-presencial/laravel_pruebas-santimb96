<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Saludar;
use App\Http\Controllers\CookiesController;
use App\Http\Controllers\HolaMundo;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * cada ruta que definamos,
 */
/*
Route::get('/', function () {
    return "me cago en mi puta estampa!";
});
Route::get('mensaje', function (){
   return "hola holita vecinito!";
});*/
/*
Route::get('/', function(){
    return view('welcome');
});
*/
Route::view('/', 'welcome');

Route::get('bienvenido', [Saludar::class, 'saludar']);

Route::get('saludar/{name?}', function($name='Pepe'){
    $titulo = 'Terminator';
   return view('saludar', ['name' => strtoupper($name),
       'titulo' => strtoupper($titulo)]);
});

Route::get('hola_mundo', HolaMundo::class);


Route::get('cookies/{indice?}', [CookiesController::class, 'obtenerCookies']);

Route::get('vista-view/{indice?}', [CookiesController::class, 'vistaCookies']);



