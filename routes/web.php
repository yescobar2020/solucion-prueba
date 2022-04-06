<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DetalleController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Crud de clientes

Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index')->middleware('auth');
Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create')->middleware('auth');
Route::post('/clientes/store', [ClienteController::class, 'store'])->name('clientes.store');
Route::get('/clientes/edit/{id}', [ClienteController::class, 'edit'])->name('clientes.edit');
Route::patch('/clientes/update/{id}', [ClienteController::class, 'update'])->name('clientes.update');
Route::delete('/clientes/delete/{id}', [ClienteController::class, 'destroy'])->name('clientes.delete');
Route::get('/clientes/show/{id}', [ClienteController::class, 'show'])->name('clientes.show');


//rutas de los servicios

Route::get('/servicios', [DetalleController::class, 'index'])->name('servicios.index')->middleware('auth');
Route::get('/servicios/create', [DetalleController::class, 'create'])->name('servicios.create')->middleware('auth');
Route::post('/servicios/store', [DetalleController::class, 'store'])->name('servicios.store');
Route::get('/servicios/edit/{id}', [DetalleController::class, 'edit'])->name('servicios.edit');
Route::patch('/servicios/update/{id}', [DetalleController::class, 'update'])->name('servicios.update');

//rutas para asignar servicio por clientes

Route::get('/servicios/asignarServicios/{id}', [DetalleController::class, 'asignarServicio'])->name('servicios.asignarServicios');
Route::post('/servicios/guardarAsignacion/{id}', [DetalleController::class, 'guardarAsignacion'])->name('servicios.guardarAsignacion');

