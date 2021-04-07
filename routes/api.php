<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipamentoController;

Route::get('/equipamentos', [EquipamentoController::class, 'list'])->name('equipamentos.list');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
