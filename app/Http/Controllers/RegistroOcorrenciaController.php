<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegistroOcorrenciaRequest;
use App\Models\RegistroOcorrencia;

class RegistroOcorrenciaController extends Controller
{
    public $tipos = ['serviço', 'produto', ];
    public $necessario_correcao_imediata = ['Sim', 'Não', ];

    public function index(Request $request) {
        $pesquisa = $request->pesquisa;
        
        if($pesquisa != '') {
            $registro = RegistroOcorrencia::where('numero', 'like', "%".$pesquisa."%")
                                            ->orWhere('origem', 'like', "%".$pesquisa."%")
                                            ->orWhere('data_de_abertura', 'like', "%".$pesquisa."%")
                                            ->orWhere('identificacao_do_equipamento', 'like', "%".$pesquisa."%")
                                            ->orWhere('descrever_correcao', 'like', "%".$pesquisa."%")
                                            ->orWhere('ocorrencia_e_um_trabalho_NC', 'like', "%".$pesquisa."%")
                                            ->orWhere('registro_de_AC_n', 'like', "%".$pesquisa."%")
                                            ->orWhere('parecer_tecnico', 'like', "%".$pesquisa."%")
                                            ->orWhere('observacoes', 'like', "%".$pesquisa."%")->paginate(1000);
        } else {
            $registro = RegistroOcorrencia::paginate(10);
        }
        return view('registro_de_ocorrencia.index', compact('registro'));
    } 
    public function novo() {
        $tipos = $this->tipos;
        $necessario_correcao_imediata = $this->necessario_correcao_imediata;
        return view('registro_de_ocorrencia.form', compact('tipos', 'necessario_correcao_imediata'));
    }
    public function editar($id) {
        $tipos = $this->tipos;
        $necessario_correcao_imediata = $this->necessario_correcao_imediata;
        $registro = RegistroOcorrencia::find($id);
        return view('registro_de_ocorrencia.form', compact('registro', 'tipos', 'necessario_correcao_imediata'));
    }
    public function salvar(Request $request) {
        
        //$ehValido = $request->validated();

        if($request->id != '') {
            $registro = RegistroOcorrencia::find($request->id);
            $registro->update($request->all());
        } else {
            $registro = RegistroOcorrencia::create($request->all());
        }
        return redirect('/registro_de_ocorrencia/editar/'. $registro->id)->with('success', 'Salvo com sucesso!');
    }
    public function deletar($id) {
        $registro = RegistroOcorrencia::find($id);
        if(!empty($registro)){
            $registro->delete();
            return redirect('registro_de_ocorrencia')->with('success', 'Deletado com sucesso!');
        } else {
            return redirect('registro_de_ocorrencia')->with('danger', 'Registro não encontrado!');
        }
    }
}
