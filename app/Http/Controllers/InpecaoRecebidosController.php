<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inspecao_recebido;
use App\Models\Perguntas_lista_inspecao;
use App\Models\Respostas_lista_inspecao;
use App\Http\Requests\Inspecao_recebidoRequest;


class InpecaoRecebidosController extends Controller
{
    public function index(Request $request) {
        $pesquisa = $request->pesquisa;

        if($pesquisa != '') {
            $inspecao_recebidos = Inspecao_recebido::where('nome', 'like', "%".$pesquisa."%")->paginate(1000);
        } else {
            $inspecao_recebidos = Inspecao_recebido::paginate(10);
        }
        return view('inspecao_recebidos.index', compact('inspecao_recebidos','pesquisa'));
    } 
    public function novo() {

        return view('inspecao_recebidos.form', compact(''));
    }
    public function editar($id) {

        $inspecao_recebidos = Inspecao_recebido::find($id);
        return view('inspecao_recebidos.form', compact('inspecao_recebidos'));
    }
    public function salvar(Inspecao_recebidosRequest $request) {

        $ehvalido = $request->validated();
        if($request->id != '') {
            $inspecao_recebidos = Inspecao_recebido::find($request->id);
            $inspecao_recebidos->update($request->all());
        } else {
            $inspecao_recebidos = Inspecao_recebido::create($request->all());
        }
        return redirect('/inspecao_recebidos/editar/'. $inspecao_recebidos->id)->with('success', 'Salvo com sucesso!');
    }
    public function deletar($id) {
        $inspecao_recebidos = Inspecao_recebido::find($id);
        if(!empty($inspecao_recebidos)){
            $inspecao_recebidos->delete();
            return redirect('inspecao_recebidos')->with('success', 'Deletado com sucesso!');
        } else {
            return redirect('inspecao_recebidos')->with('danger', 'Registro não encontrado!');
        }
    }
}
