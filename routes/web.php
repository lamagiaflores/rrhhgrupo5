<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('departamentos', App\Http\Controllers\DepartamentoController::class);
    Route::resource('cargos', App\Http\Controllers\CargoController::class);
    Route::resource('empleados', App\Http\Controllers\EmpleadoController::class);
    Route::resource('contratos', App\Http\Controllers\ContratoController::class);
    Route::resource('asistencias', App\Http\Controllers\AsistenciaController::class);
    Route::resource('planillas', App\Http\Controllers\PlanillaController::class);
});

require __DIR__.'/auth.php';