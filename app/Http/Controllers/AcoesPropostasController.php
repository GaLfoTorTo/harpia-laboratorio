<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AcoesPropostasRequest;
use App\Models\AcoesPropostas;
use App\Models\Novo_Rnc;

class AcoesPropostasController extends Controller
{  

        public $necessario_prorrogacao = ['Sim', 'Não'];

        public function index(Request $request) {
        $pesquisa = $request->pesquisa;

        if($pesquisa != '') {
        $acoes_propostas = AcoesPropostas::where('acao', 'like', "%".$pesquisa."%")
                                           ->orWhere('responsavel', 'like', "%".$pesquisa."%")
                                           ->orWhere('prazo', 'like', "%".$pesquisa."%") 
                                           ->orWhere('prazo_final', 'like', "%".$pesquisa."%") 
                                           ->orWhere('necessario_prorrogacao', 'like', "%".$pesquisa."%") 
                                           ->orWhere('data_encerramento', 'like', "%".$pesquisa."%")->paginate(1000);  
        } else {
        $acoes_propostas = AcoesPropostas::paginate(10);
        }
        return view('acoes_propostas.index', compact('acoes_propostas', 'pesquisa'));
} 
        public function novo() {

        $novos_rncs = Novo_Rnc::select('responsavel')->get();    

        $necessario_prorrogacao = $this->necessario_prorrogacao;

        return view('acoes_propostas.form', compact('novos_rncs', 'necessario_prorrogacao'));
        }

        public function editar($id) {

            $novos_rncs = Novo_Rnc::select('responsavel')->get(); 

            $acoes_propostas = AcoesPropostas::find($id);
            $necessario_prorrogacao = $this->necessario_prorrogacao;

            return view('acoes_propostas.form', compact('novos_rncs', 'acoes_propostas','necessario_prorrogacao'));
        }

        public function salvar(AcoesPropostasRequest $request) {

            $ehvalido = $request->validated();

            if($request->id != '') {
                $acoes_propostas = AcoesPropostas::find($request->id);
                $acoes_propostas->update($request->all());
            } else {
                $acoes_propostas = AcoesPropostas::create($request->all());
            }
            return redirect('/acoes_propostas/editar/'. $acoes_propostas->id)->with('success', 'Salvo com sucesso!');
        }
        public function deletar($id) {
            $acoes_propostas = AcoesPropostas::find($id);
            if(!empty($acoes_propostas)){
                $acoes_propostas->delete();
                return redirect('acoes_propostas')->with('success', 'Deletado com sucesso!');
            } else {
                return redirect('acoes_propostas')->with('danger', 'Registro não encontrado!');
            }
    }
    public function list() {
        $acoes_propostas = AcoesPropostas::paginate();

        return response()->json($acoes_propostas, 200);
    }
        
}

