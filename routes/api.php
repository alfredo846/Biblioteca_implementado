<?php

use App\Http\Controllers\api\v1\CarrerasController;
use App\Http\Controllers\api\v1\GruposController;
use App\Http\Controllers\api\v1\PrestamosController;
use Illuminate\Support\Facades\Route;

Route::get('carreras', [CarrerasController::class, 'index']);
Route::get('grupos', [GruposController::class, 'index']);
Route::get('prestamos', [PrestamosController::class, 'index']);