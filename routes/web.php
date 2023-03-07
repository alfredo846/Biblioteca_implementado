<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\estudiantesController;
use App\Http\Controllers\AlumnosBController;
use App\Http\Controllers\PrestamosController;
use App\Http\Controllers\TemaController;
use App\Http\Controllers\autoresController;
use App\Http\Controllers\editorialesController;
use App\Http\Controllers\librosController;
use App\Http\Controllers\ReportePController;
use App\Http\Controllers\ReporteLController;



/**
 * Correr el siguiente comando en la consola para ver las rutas
 *
 * php artisan route:list
 */

Route::get('/', function () {
    return redirect()->route('prestamos.index');
})->name('index')->middleware(['auth:root']);

// <-- Bienvenida -->
Route::view('/bienvenida', 'bienvenida')->name('bienvenida');

/**
 * Auth biblioteca
 */
Route::prefix('auth')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
});

Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth:root');


Route::resource('estudiantes', EstudiantesController::class)->except('show')->
parameters([
    'estudiantes' => 'estudiantes'
    ])->middleware('auth:root');

Route::put('estudiantes/togglestatus/{estudiantes}', [EstudiantesController::class, 'toggleStatus'])->name('estudiantes.toggle.status')->middleware(['auth:root']);

Route::resource('alumnoB', AlumnosBController::class)->except('show')->
parameters([
    'alumnoB' => 'alumnoB'
    ])->middleware('auth:root');

Route::resource('prestamos', PrestamosController::class)->except('show')->
parameters([
    'prestamos' => 'prestamo'
    ])->middleware('auth:root');

Route::put('prestamos/togglestatus/{prestamo}', [PrestamosController::class, 'toggleStatus'])->name('prestamos.toggle.status')->middleware(['auth:root']);
//Fani
Route::resource('autores', autoresController::class)->except('show')->parameters([
    'autores' => 'autores'
    ])->middleware('auth:root');
    Route::put('autores/togglestatus/{autores}', [autoresController::class, 'toggleStatus'])->name('autores.toggle.status')->middleware(['auth:root']);

    Route::resource('editoriales', editorialesController::class)->except('show')->parameters([
        'editoriales' => 'editoriales'
        ])->middleware('auth:root');
        Route::put('editoriales/togglestatus/{editoriales}', [editorialesController::class, 'toggleStatus'])->name('editoriales.toggle.status')->middleware(['auth:root']);
        //Fani end

//Frank
Route::resource('temas', TemaController::class)->except('show')->
parameters([
    'temas' => 'temas'
    ])->middleware('auth:root');

Route::put('temas/togglestatus/{temas}', [TemaController::class, 'toggleStatus'])->name('temas.toggle.status')->middleware(['auth:root']);

//frank end

    Route::get('usuario/perfil', [AdminController::class, 'perfil'])->middleware('auth:root')->name('perfil');
    Route::put('updatepassword/{id}', [AdminController::class, 'updatepassword'])->name('updatepassword');
    Route::put('updatefoto/{id}', [AdminController::class, 'updatefoto'])->name('updatefoto');

//Alberto

Route::resource('libros', librosController::class)->except('show')->middleware('auth:root');

    Route::put('libros/togglestatus/{libro}', [librosController::class, 'toggleStatus'])->name('libros.toggle.status')->middleware(['auth:root']);

//Alberto end

    //Reportes
Route::get('consultaP', [ReportePController::class, 'consultaP'])->name('consultaP')->middleware('auth:root');
Route::get('contenidoP', [ReportePController::class, 'contenidoP'])->name('contenidoP')->middleware('auth:root');
Route::get('detalle_carrerasP/{idca}',[ReportePController::class, 'detalle_carrerasP'])->name('detalle_carrerasP')->middleware('auth:root');

Route::get('consultaL', [ReporteLController::class, 'consultaL'])->name('consultaL')->middleware('auth:root');
Route::get('contenidoL', [ReporteLController::class, 'contenidoL'])->name('contenidoL')->middleware('auth:root');
Route::get('detalle_carrerasL/{idca}',[ReporteLController::class, 'detalle_carrerasL'])->name('detalle_carrerasL')->middleware('auth:root');

Route::get('download-pdf/{libro}', [librosController::class, 'downloadPDF'])->name('download-pdf');
