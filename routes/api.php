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

Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
