<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController; 

// 1. Ruta principal: Muestra el formulario
Route::get('/', [ContactoController::class, 'mostrarFormulario'])->name('contacto.formulario');

// 2. Ruta para guardar el formulario
Route::post('/contacto', [ContactoController::class, 'guardarContacto'])->name('contacto.guardar');

// 3. Ruta para mostrar la lista de contactos
Route::get('/contactos', [ContactoController::class, 'mostrarContactos'])->name('contactos.lista');

// 4. Ruta para eliminar un contacto específico
Route::delete('/contactos/{contacto}', [ContactoController::class, 'eliminarContacto'])->name('contacto.eliminar');