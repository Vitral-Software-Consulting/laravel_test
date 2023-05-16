<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReservaController;
use App\Http\Middleware\SoloEmpleados;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/clientes/create', function () {
    return view('clientes.create');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/clientes', ClienteController::class)->middleware('solo_empleados');

Route::resource('/books', BookController::class)->middleware('solo_empleados');
Route::resource('/reservas', ReservaController::class)->middleware('solo_empleados');