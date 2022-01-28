<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperheroeController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('/home', SuperheroeController::class);

Route::get('/home/create/{lang?}', [SuperheroeController::class, 'create']);
Route::get('/home/{id}/edit/{lang?}', [SuperheroeController::class, 'edit']);

//Route::resource('home/superheroes', SuperheroeController::class);
