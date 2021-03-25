<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DExternoController;


Route::get('/', [DExternoController::class, 'index']);
Route::get('/documentos_externos', [DExternoController::class, 'index'])->name('documentos_externos');
Route::get('/documentos_externos/novo', [DExternoController::class, 'novo'])->name('documentos_externos.novo');
Route::get('/documentos_externos/editar/{id}', [DExternoController::class, 'editar'])->name('documentos_externos.editar');
Route::post('/documentos_externos/salvar/{id}', [DExternoController::class, 'salvar'])->name('documentos_externos.salvar');
Route::get('/documentos_externos/deletar/{id}', [DExternoController::class, 'deletar'])->name('documentos_externos.deletar');






