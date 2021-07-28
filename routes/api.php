<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResetSenhaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\EquipamentoController;
use App\Http\Controllers\ColaboradorController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\EquipamentosInsumosController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AutenticacaoController;
use App\Http\Controllers\SetoresController;
use App\Http\Controllers\ListaMestraController;
use App\Http\Controllers\ProcedimentoController;
use App\Http\Controllers\RegistroTreinamentoController;
use App\Http\Controllers\ParticipantesTreinamentoController;
use App\Http\Controllers\CargosController;
use App\Http\Controllers\AnaliseCriticaController;
use App\Http\Controllers\RegistroOcorrenciaController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\ReclamacoesController;
use App\Http\Controllers\NovoRncController;
use App\Http\Controllers\InspecaoRecebidosController;
use App\Http\Controllers\C_temperaturaController;
use App\Http\Controllers\AcoesPropostasController;

Route::post('/logarApp', [AutenticacaoController::class, 'logarApp'])->name('logarApp');

Route::get('/logout', [AutenticacaoController::class, 'logout'])->name('logout');

Route::get('/cargos', [CargosController::class, 'index'])->name('cargos');
Route::get('/cargos/deletar/{id}', [CargosController::class, 'deletar'])->name('cargos.deletar');
Route::post('/cargos/salvar', [CargosController::class, 'salvar'])->name('cargos.salvar');

Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes');
Route::get('/clientes/deletar/{id}', [ClienteController::class, 'deletar'])->name('clientes.deletar');
Route::post('/clientes/salvar', [ClienteController::class, 'salvar'])->name('clientes.salvar');

Route::get('/colaboradores', [ColaboradorController::class, 'index'])->name('colaboradores');
Route::get('/colaboradores/novo', [ColaboradorController::class, 'novo'])->name('colaboradores.novo');
Route::get('/colaboradores/deletar/{id}', [ColaboradorController::class, 'deletar'])->name('colaboradores.deletar');
Route::post('/colaboradores/salvar', [ColaboradorController::class, 'salvar'])->name('colaboradores.salvar');

Route::get('/documentos', [DocumentoController::class, 'index'])->name('documentos');
Route::get('/documentos/novo', [DocumentoController::class, 'novo'])->name('documentos.novo');
Route::get('/documentos/deletar/{id}', [DocumentoController::class, 'deletar'])->name('documentos.deletar');
Route::post('/documentos/salvar', [DocumentoController::class, 'salvar'])->name('documentos.salvar');

Route::get('/equipamentos', [EquipamentoController::class, 'index'])->name('equipamentos');
Route::get('/equipamentos/novo', [EquipamentoController::class, 'novo'])->name('equipamentos.novo');
Route::get('/equipamentos/deletar/{id}', [EquipamentoController::class, 'deletar'])->name('equipamentos.deletar');
Route::post('/equipamentos/salvar', [EquipamentoController::class, 'salvar'])->name('equipamentos.salvar');

Route::get('/fornecedores', [FornecedorController::class, 'index'])->name('fornecedores');
Route::get('/fornecedores/deletar/{id}', [FornecedorController::class, 'deletar'])->name('fornecedores.deletar');
Route::post('/fornecedores/salvar', [FornecedorController::class, 'salvar'])->name('fornecedores.salvar');

Route::get('/servicos', [ServicoController::class, 'index'])->name('servicos');
Route::get('/servicos/deletar/{id}', [ServicoController::class, 'deletar'])->name('servicos.deletar');
Route::post('/servicos/salvar', [ServicoController::class, 'salvar'])->name('servicos.salvar');

Route::get('/setores', [SetoresController::class, 'index'])->name('setores');
Route::get('/setores/novo', [SetoresController::class, 'novo'])->name('setores.novo');
Route::get('/setores/deletar/{id}', [SetoresController::class, 'deletar'])->name('setores.deletar');
Route::post('/setores/salvar', [SetoresController::class, 'salvar'])->name('setores.salvar');

Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('/user/deletar/{id}', [UserController::class, 'deletar'])->name('user.deletar');
Route::post('/user/salvar', [UserController::class, 'salvar'])->name('user.salvar');


Route::middleware('auth:sanctum')->group(function(){
});
