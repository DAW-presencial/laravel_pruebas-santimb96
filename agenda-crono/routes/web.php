<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgendaCronoController;

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

Route::resource('agenda', AgendaCronoController::class);


Route::get('/agenda/create/{lang?}', [AgendaCronoController::class, 'create']);
Route::get('/agenda/{id}/edit/{lang?}', [AgendaCronoController::class, 'edit']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
