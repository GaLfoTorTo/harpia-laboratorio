<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipamentoController;
use App\Http\Controllers\AutenticacaoController;

Route::post('/logarApp', [AutenticacaoController::class, 'logarApp'])->name('logarApp');
Route::get('/logout', [AutenticacaoController::class, 'logout'])->name('logout');

Route::get('/equipamentos', [EquipamentoController::class, 'list'])->name('equipamentos.list');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
