<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReclamacoesRequest;
use App\Models\Reclamacao;
use App\Models\Colaborador;

class ReclamacoesController extends Controller
{
    public $tipo_manifestacao = ['Reclamação', 'Sugestão'];
    public $tipo_nc = ['Sim', 'Não'];

    public function index(Request $request) {
        $colaboradores_id = Colaborador::select('nome', 'id')->get();
        $pesquisa = $request->pesquisa;

        if($pesquisa != '') {
            $reclamacoes = Reclamacao::with('colaborador', 'rep_analise')
                                    ->where('descricao','like', "%".$pesquisa."%")
                                    ->orWhere('reclamante','like', "%".$pesquisa."%")
                                    ->orWhereHas('colaborador', function($query) use ($pesquisa){
                                        $query->where('nome','like', "%".$pesquisa."%");
                                    })
                                    ->paginate(1000);
        } else {
            $reclamacoes = Reclamacao::with('colaborador', 'rep_analise')->paginate(10);
            
        }
        return view('reclamacoes.index', compact('reclamacoes','pesquisa','colaboradores_id'));
    } 
    public function novo() {
        $rep_analise_id = Colaborador::select('nome', 'id')->get();
        $colaboradores_id = Colaborador::select('nome', 'id')->get();
        $tipo_manifestacao = $this->tipo_manifestacao;
        $tipo_nc = $this->tipo_nc;
        return view('reclamacoes.form', compact('tipo_manifestacao', 'rep_analise_id','tipo_nc','colaboradores_id'));
    }
    public function editar($id) {
        $rep_analise_id = Colaborador::select('nome', 'id')->get();
        $tipo_nc = $this->tipo_nc;
        $colaboradores_id = Colaborador::select('nome', 'id')->get();
        $reclamacao = Reclamacao::find($id);
        $tipo_manifestacao = $this->tipo_manifestacao;
        
        return view('reclamacoes.form', compact('reclamacao','tipo_nc', 'tipo_manifestacao', 'rep_analise_id', 'colaboradores_id'));
    }
    public function salvar(ReclamacoesRequest $request) {

        $ehvalido = $request->validated();
        if($request->id != '') {
            $reclamacao = Reclamacao::find($request->id);
            $reclamacao->update($request->all());
        } else {
            
            $reclamacao = Reclamacao::create($request->all());
        }

        return redirect('/reclamacoes/editar/'. $reclamacao->id)->with('success', 'Salvo com sucesso!');
    }
    public function deletar($id) {
        $reclamacao = Reclamacao::find($id);
        if(!empty($reclamacao)){
            $reclamacao->delete();
            return redirect('reclamacoes')->with('success', 'Deletado com sucesso!');
        } else {
            return redirect('reclamacoes')->with('danger', 'Registro não encontrado!');
        }
    }
}
