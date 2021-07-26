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

Route::get('/equipamentos', [EquipamentoController::class, 'list'])->name('equipamentos.list');
Route::get('/clientes', [ClienteController::class, 'indexApp'])->name('clientes');

Route::get('/cargos', [CargosController::class, 'index'])->name('cargos');
Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes');
Route::get('/colaboradores', [ColaboradorController::class, 'index'])->name('colaboradores');
Route::get('/documentos', [DocumentoController::class, 'index'])->name('documentos');
Route::get('/equipamentos', [EquipamentoController::class, 'index'])->name('equipamentos');
Route::get('/fornecedores', [FornecedorController::class, 'index'])->name('fornecedores');
Route::get('/servicos', [ServicoController::class, 'index'])->name('servicos');
Route::get('/setores', [SetoresController::class, 'index'])->name('setores');
Route::get('/users', [UserController::class, 'index'])->name('users');

Route::middleware('auth:sanctum')->group(function(){
});
