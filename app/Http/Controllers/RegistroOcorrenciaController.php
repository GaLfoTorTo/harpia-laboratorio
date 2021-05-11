<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegistroOcorrenciaRequest;
use App\Models\RegistroOcorrencia;

class RegistroOcorrenciaController extends Controller
{
    public $tipos = ['servico', 'produto', ];

    public function index(Request $request) {
        $pesquisa = $request->pesquisa;
        
        if($pesquisa != '') {
            $registro = RegistroOcorrencia::where('nome', 'like', "%".$pesquisa."%")->paginate(1000);
        } else {
            $registro = RegistroOcorrencia::paginate(10);
        }
        return view('registro_de_ocorrencia.index', compact('registro'));
    } 
    public function novo() {
        $tipos = $this->tipos;
        return view('registro_de_ocorrencia.form', compact('tipos'));
    }
    public function editar($id) {
        $tipos = $this->tipos;
        $registro = RegistroOcorrencia::find($id);
        return view('registro_de_ocorrencia.form', compact('registro', 'tipos'));
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
