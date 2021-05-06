<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inspecao_recebidos;
use App\Models\Perguntas_lista_inspecao;
use App\Models\Respostas_lista_inspecao;

class InspecaoRecebidosController extends Controller
{
    public function index(Request $request) {
        $pesquisa = $request->pesquisa;

        if($pesquisa != '') {
            $inspecao_recebidos = Inspecao_recebidos::where('nome', 'like', "%".$pesquisa."%")->paginate(1000);
        } else {
            $inspecao_recebidos = Inspecao_recebidos::paginate(10);
        }
        return view('inspecao_recebidos.index', compact('inspecao_recebidos','pesquisa'));
    } 
    public function novo() {
        $pergunta = Perguntas_lista_inspecao::get();
        return view('inspecao_recebidos.form', compact('pergunta'));
    }
    public function editar($id) {
        $pergunta = Perguntas_lista_inspecao::get();
        $inspecao_recebidos = Inspecao_recebidos::find($id);
        return view('inspecao_recebidos.form', compact('inspecao_recebidos','pergunta'));
    }
    public function salvar(Inspecao_recebidosRequest $request) {

        $ehvalido = $request->validated();
        if($request->id != '') {
            $inspecao_recebidos = Inspecao_recebidos::find($request->id);
            $inspecao_recebidos->update($request->all());
        } else {
            $inspecao_recebidos = Inspecao_recebidos::create($request->all());
        }
        return redirect('/inspecao_recebidos/editar/'. $inspecao_recebidos->id)->with('success', 'Salvo com sucesso!');
    }
    public function deletar($id) {
        $inspecao_recebidos = Inspecao_recebidos::find($id);
        if(!empty($inspecao_recebidos)){
            $inspecao_recebidos->delete();
            return redirect('inspecao_recebidos')->with('success', 'Deletado com sucesso!');
        } else {
            return redirect('inspecao_recebidos')->with('danger', 'Registro não encontrado!');
        }
    }
}
