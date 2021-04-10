<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClienteController;

use App\Http\Controllers\documentos_internos;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\DExternoController;
use App\Http\Controllers\EquipamentoController;
use App\Http\Controllers\ColaboradorController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\EquipamentosInsumosController;
use App\Http\Controllers\DocumentosInternosController;

Route::get('/', [DExternoController::class, 'index']);
Route::get('/documentos_externos', [DExternoController::class, 'index'])->name('documentos_externos');
Route::get('/documentos_externos/novo', [DExternoController::class, 'novo'])->name('documentos_externos.novo');
Route::get('/documentos_externos/editar/{id}', [DExternoController::class, 'editar'])->name('documentos_externos.editar');
Route::post('/documentos_externos/salvar', [DExternoController::class, 'salvar'])->name('documentos_externos.salvar');
Route::get('/documentos_externos/deletar/{id}', [DExternoController::class, 'deletar'])->name('documentos_externos.deletar');


Route::get('/', [DashboardController::class, 'index']);

Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes');
Route::get('/clientes/novo', [ClienteController::class, 'novo'])->name('clientes.novo');
Route::get('/clientes/editar/{id}', [ClienteController::class, 'editar'])->name('clientes.editar');
Route::post('/clientes/salvar', [ClienteController::class, 'salvar'])->name('clientes.salvar');
Route::get('/clientes/deletar/{id}', [ClienteController::class, 'deletar'])->name('clientes.deletar');

Route::get('/equipamentos', [EquipamentoController::class, 'index'])->name('equipamentos');
Route::get('/equipamentos/novo', [EquipamentoController::class, 'novo'])->name('equipamentos.novo');
Route::get('/equipamentos/editar/{id}', [EquipamentoController::class, 'editar'])->name('equipamentos.editar');
Route::post('/equipamentos/salvar', [EquipamentoController::class, 'salvar'])->name('equipamentos.salvar');
Route::get('/equipamentos/deletar/{id}', [EquipamentoController::class, 'deletar'])->name('equipamentos.deletar');


Route::get('/colaboradores', [ColaboradorController::class, 'index'])->name('colaboradores');
Route::get('/colaboradores/novo', [ColaboradorController::class, 'novo'])->name('colaboradores.novo');
Route::get('/colaboradores/editar/{id}', [ColaboradorController::class, 'editar'])->name('colaboradores.editar');
Route::post('colaboradores/salvar', [ColaboradorController::class, 'salvar'])->name('colaboradores.salvar');
Route::get('/colaboradores/deletar/{id}', [ColaboradorController::class, 'deletar'])->name('colaboradores.deletar');

Route::get('/servicos', [ServicoController::class, 'index'])->name('servicos');
Route::get('/servicos/novo', [ServicoController::class, 'novo'])->name('servicos.novo');
Route::get('/servicos/editar/{id}', [ServicoController::class, 'editar'])->name('servicos.editar');
Route::post('servicos/salvar', [ServicoController::class, 'salvar'])->name('servicos.salvar');
Route::get('/servicos/deletar/{id}', [ServicoController::class, 'deletar'])->name('servicos.deletar');

Route::get('/documentos_internos', [DocumentosInternosController::class, 'index'])->name('documentos_internos');
Route::get('/documentos_internos/novo', [DocumentosInternosController::class, 'novo'])->name('documentos_internos.novo');
Route::get('/documentos_internos/editar/{id}', [DocumentosInternosController::class, 'editar'])->name('documentos_internos.editar');
Route::post('documentos_internos/salvar', [DocumentosInternosController::class, 'salvar'])->name('documentos_internos.salvar');
Route::get('/documentos_internos/deletar/{id}', [DocumentosInternosController::class, 'deletar'])->name('documentos_internos.deletar');

Route::get('/fornecedores', [FornecedorController::class, 'index'])->name('fornecedores');
Route::get('/fornecedores/novo', [FornecedorController::class, 'novo'])->name('fornecedores.novo');
Route::get('/fornecedores/editar/{id}', [FornecedorController::class, 'editar'])->name('fornecedores.editar');
Route::post('fornecedores/salvar', [FornecedorController::class, 'salvar'])->name('fornecedores.salvar');
Route::get('/fornecedores/deletar/{id}', [FornecedorController::class, 'deletar'])->name('fornecedores.deletar');

Route::get('/equipamentos_insumos', [EquipamentosInsumosController::class, 'index'])->name('equipamentos_insumos');
Route::get('/equipamentos_insumos/novo', [EquipamentosInsumosController::class, 'novo'])->name('equipamentos_insumos.novo');
Route::get('/equipamentos_insumos/editar/{id}', [EquipamentosInsumosController::class, 'editar'])->name('equipamentos_insumos.editar');
Route::post('equipamentos_insumos/salvar', [EquipamentosInsumosController::class, 'salvar'])->name('equipamentos_insumos.salvar');
Route::get('/equipamentos_insumos/deletar/{id}', [EquipamentosInsumosController::class, 'deletar'])->name('equipamentos_insumos.deletar');
