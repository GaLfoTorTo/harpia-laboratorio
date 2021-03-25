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

use App\Http\Controllers\ColaboradorController;

Route::get('/', [DashboardController::class, 'index']);

Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes');
Route::get('/clientes/novo', [ClienteController::class, 'novo'])->name('clientes.novo');
Route::get('/clientes/editar/{id}', [ClienteController::class, 'editar'])->name('clientes.editar');
Route::post('/clientes/salvar', [ClienteController::class, 'salvar'])->name('clientes.salvar');
Route::get('/clientes/deletar/{id}', [ClienteController::class, 'deletar'])->name('clientes.deletar');

Route::get('/colaboradores', [ColaboradorController::class, 'index'])->name('colaboradores');
Route::get('/colaboradores/novo', [ColaboradorController::class, 'novo'])->name('colaboradores.novo');
Route::get('/colaboradores/editar/{id}', [ColaboradorController::class, 'editar'])->name('colaboradores.editar');
Route::post('colaboradores/salvar', [ColaboradorController::class, 'salvar'])->name('colaboradores.salvar');
Route::get('/colaboradores/deletar/{id}', [ColaboradorController::class, 'deletar'])->name('colaboradores.deletar');

