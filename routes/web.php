<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/login', [AutenticacaoController::class, 'index'])->name('login');
Route::post('/logar', [AutenticacaoController::class, 'logar'])->name('logar');
Route::get('/logout', [AutenticacaoController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () { 

    Route::get('/', [DashboardController::class, 'index'])->middleware('auth');

    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user/novo', [UserController::class, 'novo'])->name('user.novo');
    Route::get('/user/editar/{id}', [UserController::class, 'editar'])->name('user.editar');
    Route::post('/user/salvar', [UserController::class, 'salvar'])->name('user.salvar');
    Route::get('/user/deletar/{id}', [UserController::class, 'deletar'])->name('user.deletar');

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

    Route::get('/setores', [SetoresController::class, 'index'])->name('setores');
    Route::get('/setores/novo', [SetoresController::class, 'novo'])->name('setores.novo');
    Route::get('/setores/editar/{id}', [SetoresController::class, 'editar'])->name('setores.editar');
    Route::post('setores/salvar', [SetoresController::class, 'salvar'])->name('setores.salvar');
    Route::get('/setores/deletar/{id}', [SetoresController::class, 'deletar'])->name('setores.deletar');
    
    Route::get('/registro_treinamento', [RegistroTreinamentoController::class, 'index'])->name('registro_treinamento');
    Route::get('/registro_treinamento/novo', [RegistroTreinamentoController::class, 'novo'])->name('registro_treinamento.novo');
    Route::get('/registro_treinamento/editar/{id}', [RegistroTreinamentoController::class, 'editar'])->name('registro_treinamento.editar');
    Route::post('registro_treinamento/salvar', [RegistroTreinamentoController::class, 'salvar'])->name('registro_treinamento.salvar');
    Route::get('/registro_treinamento/deletar/{id}', [RegistroTreinamentoController::class, 'deletar'])->name('registro_treinamento.deletar');

    Route::get('/participantes_treinamento', [ParticipantesTreinamentoController::class, 'index'])->name('participantes_treinamento');
    Route::get('/participantes_treinamento/novo', [ParticipantesTreinamentoController::class, 'novo'])->name('participantes_treinamento.novo');
    Route::get('/participantes_treinamento/editar/{id}', [ParticipantesTreinamentoController::class, 'editar'])->name('participantes_treinamento.editar');
    Route::post('participantes_treinamento/salvar', [ParticipantesTreinamentoController::class, 'salvar'])->name('participantes_treinamento.salvar');
    Route::get('/participantes_treinamento/deletar/{id}', [ParticipantesTreinamentoController::class, 'deletar'])->name('participantes_treinamento.deletar');

    Route::get('/cargos', [CargosController::class, 'index'])->name('cargos');
    Route::get('/cargos/novo', [CargosController::class, 'novo'])->name('cargos.novo');
    Route::get('/cargos/editar/{id}', [CargosController::class, 'editar'])->name('cargos.editar');
    Route::post('cargos/salvar', [CargosController::class, 'salvar'])->name('cargos.salvar');
    Route::get('/cargos/deletar/{id}', [CargosController::class, 'deletar'])->name('cargos.deletar');
    
    Route::get('/reclamacoes', [ReclamacoesController::class, 'index'])->name('reclamacoes');
    Route::get('/reclamacoes/novo', [ReclamacoesController::class, 'novo'])->name('reclamacoes.novo');
    Route::get('/reclamacoes/editar/{id}', [ReclamacoesController::class, 'editar'])->name('reclamacoes.editar');
    Route::post('reclamacoes/salvar', [ReclamacoesController::class, 'salvar'])->name('reclamacoes.salvar');
    Route::get('/reclamacoes/deletar/{id}', [ReclamacoesController::class, 'deletar'])->name('reclamacoes.deletar');

    Route::get('/procedimento', [ProcedimentoController::class, 'index'])->name('procedimento');
    Route::get('/procedimento/novo', [ProcedimentoController::class, 'novo'])->name('procedimento.novo');
    Route::get('/procedimento/editar/{id}', [ProcedimentoController::class, 'editar'])->name('procedimento.editar');
    Route::post('procedimento/salvar', [ProcedimentoController::class, 'salvar'])->name('procedimento.salvar');
    Route::get('/procedimento/deletar/{id}', [ProcedimentoController::class, 'deletar'])->name('procedimento.deletar');

    Route::get('/analise_critica', [AnaliseCriticaController::class, 'index'])->name('analise_critica');
    Route::get('/analise_critica/novo', [AnaliseCriticaController::class, 'novo'])->name('analise_critica.novo');
    Route::get('/analise_critica/editar/{id}', [AnaliseCriticaController::class, 'editar'])->name('analise_critica.editar');
    Route::post('analise_critica/salvar', [AnaliseCriticaController::class, 'salvar'])->name('analise_critica.salvar');
    Route::get('/analise_critica/deletar/{id}', [AnaliseCriticaController::class, 'deletar'])->name('analise_critica.deletar');

    Route::get('/registro_de_ocorrencia', [RegistroOcorrenciaController::class, 'index'])->name('registro_de_ocorrencia');
    Route::get('/registro_de_ocorrencia/novo', [RegistroOcorrenciaController::class, 'novo'])->name('registro_de_ocorrencia.novo');
    Route::get('/registro_de_ocorrencia/editar/{id}', [RegistroOcorrenciaController::class, 'editar'])->name('registro_de_ocorrencia.editar');
    Route::post('registro_de_ocorrencia/salvar', [RegistroOcorrenciaController::class, 'salvar'])->name('registro_de_ocorrencia.salvar');
    Route::get('/registro_de_ocorrencia/deletar/{id}', [RegistroOcorrenciaController::class, 'deletar'])->name('registro_de_ocorrencia.deletar');

    Route::get('/novo_rnc', [NovoRncController::class, 'index'])->name('novo_rnc');
    Route::get('/novo_rnc/novo', [NovoRncController::class, 'novo'])->name('novo_rnc.novo');
    Route::get('/novo_rnc/editar/{id}', [NovoRncController::class, 'editar'])->name('novo_rnc.editar');
    Route::post('novo_rnc/salvar', [NovoRncController::class, 'salvar'])->name('novo_rnc.salvar');
    Route::get('/novo_rnc/deletar/{id}', [NovoRncController::class, 'deletar'])->name('novo_rnc.deletar');

    Route::get('/acoes_propostas', [AcoesPropostasController::class, 'index'])->name('acoes_propostas');
    Route::get('/acoes_propostas/novo', [AcoesPropostasController::class, 'novo'])->name('acoes_propostas.novo');
    Route::get('/acoes_propostas/editar/{id}', [AcoesPropostasController::class, 'editar'])->name('acoes_propostas.editar');
    Route::post('acoes_propostas/salvar', [AcoesPropostasController::class, 'salvar'])->name('acoes_propostas.salvar');
    Route::get('/acoes_propostas/deletar/{id}', [AcoesPropostasController::class, 'deletar'])->name('acoes_propostas.deletar');

    Route::get('/lista_mestras', [ListaMestraController::class, 'index'])->name('lista_mestra');
    Route::get('/lista_mestras/novo', [ListaMestraController::class, 'novo'])->name('lista_mestra.novo');
    Route::get('/lista_mestras/editar/{id}', [ListaMestraController::class, 'editar'])->name('lista_mestra.editar');
    Route::post('lista_mestras/salvar', [ListaMestraController::class, 'salvar'])->name('lista_mestra.salvar');
    Route::get('/lista_mestras/deletar/{id}', [ListaMestraController::class, 'deletar'])->name('lista_mestra.deletar');

    Route::get('/inspecao_recebidos', [InspecaoRecebidosController::class, 'index'])->name('inspecao_recebidos');
    Route::get('/inspecao_recebidos/novo', [InspecaoRecebidosController::class, 'novo'])->name('inspecao_recebidos.novo');
    Route::get('/inspecao_recebidos/editar/{id}', [InspecaoRecebidosController::class, 'editar'])->name('inspecao_recebidos.editar');
    Route::post('/inspecao_recebidos/salvar', [InspecaoRecebidosController::class, 'salvar'])->name('inspecao_recebidos.salvar');
    Route::get('/inspecao_recebidos/deletar/{id}', [InspecaoRecebidosController::class, 'deletar'])->name('inspecao_recebidos.deletar');

    Route::get('/c_temperatura', [C_temperaturaController::class, 'index'])->name('c_temperatura');
    Route::get('/c_temperatura/novo', [C_temperaturaController::class, 'novo'])->name('c_temperatura.novo');
    Route::get('/c_temperatura/editar/{id}', [C_temperaturaController::class, 'editar'])->name('c_temperatura.editar');
    Route::post('c_temperatura/salvar', [C_temperaturaController::class, 'salvar'])->name('c_temperatura.salvar');
    Route::get('/c_temperatura/deletar/{id}', [C_temperaturaController::class, 'deletar'])->name('c_temperatura.deletar');

    Route::get('/documento', [DocumentoController::class, 'index'])->name('documento');
    Route::get('/documento/novo', [DocumentoController::class, 'novo'])->name('documento.novo');
    Route::get('/documento/editar/{id}', [DocumentoController::class, 'editar'])->name('documento.editar');
    Route::post('/documento/salvar', [DocumentoController::class, 'salvar'])->name('documento.salvar');
    Route::get('/documento/deletar/{id}', [DocumentoController::class, 'deletar'])->name('documento.deletar');

});