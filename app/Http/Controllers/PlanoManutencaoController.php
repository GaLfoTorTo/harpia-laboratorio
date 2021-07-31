<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlanoManutencao;

class PlanoManutencaoController extends Controller
{
    public function index(Request $request) {
        $pesquisa = $request->pesquisa;

        if($pesquisa != '') {
            $plano_manutencao = PlanoManutencao::where('nome', 'like', "%".$pesquisa."%")->paginate(1000);
        } else {
            $plano_manutencao = PlanoManutencao::with('equipamentos')->paginate(10);
        }
        
        return view('plano_manutencao.index', compact('plano_manutencao','pesquisa'));
    } 
    public function novo() {

        $tipos_unidade = $this->tipos_unidade;
        return view('plano_manutencao.form', compact('tipos_unidade'));
    }
    public function editar($id) {

        $cliente = PlanoManutencao::find($id);
        $tipos_unidade = $this->tipos_unidade;
        return view('plano_manutencao.form', compact('cliente', 'tipos_unidade'));
    }
    public function salvar(ClienteRequest $request) {

        $ehvalido = $request->validated();
        if($request->id != '') {
            $cliente = PlanoManutencao::find($request->id);
            $cliente->update($request->all());
        } else {
            $cliente = PlanoManutencao::create($request->all());
        }

        return redirect('/plano_manutencao/editar/'. $cliente->id)->with('success', 'Salvo com sucesso!');
    }

    public function deletar(Request $request, $id) {
        $cliente = PlanoManutencao::find($id);
        if(!empty($cliente)){
            $cliente->delete();
            return redirect('plano_manutencao')->with('success', 'Deletado com sucesso!');
        } else {
            return redirect('plano_manutencao')->with('danger', 'Registro não encontrado!');
        }
    }
}
