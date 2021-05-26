<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NovoRncRequest;
use App\Models\Novo_Rnc;
use App\Models\Colaborador;

class NovoRncController extends Controller
{
    public $classificacao_acao = ['Correção', 'Ação Preventiva', 'Melhoria', 'Ação Corretiva'];
    public $origem = ['Registro de Ocorrência', 'Auditoria Interna', 'Análise Crítica pela Gerência', 'Rotina', 'Gestão de Riscos', 'Auditória Externa', 'Outros', 'Reclamação', 'Proficiência', 'Interlaboratorial'];
    public $doc_referencia = ['Internos', 'CGCRE', 'Acordo Cliente'];
    public $necessario_analise = ['Sim', 'Não'];
    public $necessario_prorrogacao = ['Sim', 'Não'];
    public $nc_consequencia = ['Sim', 'Não'];
    public $tratativa_eficaz = ['Sim', 'Não'];
    public $risco_avaliado = ['Sim, não compromete os resultados', 'Sim, evidenciado na planilha de gestão de risco'];

    public function index(Request $request) {
        $pesquisa = $request->pesquisa;

        if($pesquisa != '') {
            $novo_rnc = Novo_Rnc::where('codigo', 'like', "%".$pesquisa."%")
                                  ->orWhere('revisao', 'like', "%".$pesquisa."%")
                                  ->orWhere('numero', 'like', "%".$pesquisa."%")
                                  ->orWhere('data_abertura', 'like', "%".$pesquisa."%")
                                  ->orWhere('responsavel', 'like', "%".$pesquisa."%")
                                  ->orWhere('classificacao_acao', 'like', "%".$pesquisa."%")
                                  ->orWhere('origem', 'like', "%".$pesquisa."%")->paginate(1000);

        } else {
            $novo_rnc = Novo_Rnc::paginate(10);
        }

        return view('novo_rnc.index', compact('novo_rnc','pesquisa'));
    }
    public function novo() {

        $colaborador = Colaborador::select('nome')->get();

        $classificacao_acao = $this->classificacao_acao;
        $origem = $this->origem;
        $doc_referencia = $this->doc_referencia;
        $necessario_analise = $this->necessario_analise;
        $necessario_prorrogacao = $this->necessario_prorrogacao;
        $nc_consequencia = $this->nc_consequencia;
        $tratativa_eficaz = $this->tratativa_eficaz;
        $risco_avaliado = $this->risco_avaliado;
        
        return view('novo_rnc.form', compact('colaborador','classificacao_acao', 'origem', 'doc_referencia', 'necessario_analise',
        'necessario_prorrogacao', 'nc_consequencia', 'tratativa_eficaz', 'risco_avaliado'));
    }
    public function salvar(NovoRncRequest $request) {

        $ehValido = $request->validated();
        $message = '';

        if($request->id == '') {
            $novo_rnc = Novo_Rnc::create($request->all());
            $message = 'Salvo com sucesso';
        } else {
            $message = 'Alterado com sucesso'; 
            $novo_rnc = Novo_Rnc::find($request->id);
            $novo_rnc->update($request->all());
        }
        return redirect('novo_rnc/editar/' . $novo_rnc->id)->with('success', $message);
    } 
    public function editar($id) {

        $colaborador = Colaborador::select('nome')->get();

        $novo_rnc = Novo_Rnc::find($id);
        $classificacao_acao = $this->classificacao_acao;
        $origem = $this->origem;
        $doc_referencia = $this->doc_referencia;
        $necessario_analise = $this->necessario_analise;
        $necessario_prorrogacao = $this->necessario_prorrogacao;
        $nc_consequencia = $this->nc_consequencia;
        $tratativa_eficaz = $this->tratativa_eficaz;
        $risco_avaliado = $this->risco_avaliado;
        
        
        return view('novo_rnc.form', compact('colaborador', 'novo_rnc','classificacao_acao', 'origem', 'doc_referencia',
        'necessario_analise', 'necessario_prorrogacao', 'nc_consequencia', 'tratativa_eficaz', 'risco_avaliado'));
    }
    public function deletar($id) {
        $novo_rnc = Novo_Rnc::find($id);
        $novo_rnc->delete();

        return redirect('novo_rnc')->with('success', 'Deletado com sucesso!');
    }
}

