<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\PokemonController;
use App\Http\Controllers\DataController;

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

//Route::resource('pokemons', PokemonController::class);

Route::resource('pokemons', DataController::class);

