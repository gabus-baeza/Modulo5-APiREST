<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventoController;


/** Rutas públicas*/
// Recuperar todos los eventos
Route::get('/eventos', [EventoController::class, 'index']);
// Recuperar un evento específico
Route::get('/eventos/{id}', [EventoController::class, 'show']);


// Rutas protegidas con autenticación Keycloak
Route::middleware('auth:api')->group(function () {
    // Almacenar un evento nuevo
    Route::post('/eventos', [EventoController::class, 'store']);
    // Actualizar un evento específico
    Route::put('/eventos/{evento}', [EventoController::class, 'update']);
    // Eliminar un evento específico
    Route::delete('/eventos/{id}', [EventoController::class, 'destroy']);
});
