<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RetornoRequest;
use App\Models\Retorno;
use App\Models\Colaborador;
use App\Models\Reclamacao;

class RetornoController extends Controller
{
    

    public function index(Request $request) {
        $colaboradores_id = Colaborador::select('nome', 'id')->get();
        $pesquisa = $request->pesquisa;

        if($pesquisa != '') {
            $retornos = Retorno::where('nome', 'like', "%".$pesquisa."%")->paginate(10);
        } else {
            $retornos = Retorno::paginate(10);
        }
        return view('retorno.index', compact('retornos','pesquisa','colaboradores_id'));
    } 
    public function novo(Request $request) {
        $reclamacao_id = $request->reclamacao_id;
        $colaboradores_id = Colaborador::select('nome', 'id')->get();
       
        return view('retorno.form',compact('colaboradores_id','reclamacao_id'));
    }
    public function editar(Request $request, $id) {
        $reclamacao_id = $request->reclamacao_id;
        $colaboradores_id = Colaborador::select('nome', 'id')->get();
        $retorno = Retorno::find($id);
       
        return view('retorno.form', compact('retorno','colaboradores_id','reclamacao_id'));
    }
    public function salvar(RetornoRequest $request) {

        $ehvalido = $request->validated();
        if($request->id != '') {
            $retorno = Retorno::find($request->id);
            $retorno->update($request->all());
        } else {
            $retorno = Retorno::create($request->all());
        }
        return redirect('/retorno/editar/'. $retorno->id)->with('success', 'Salvo com sucesso!');
    }
    public function deletar($id) {
            if(!empty($retorno)){
            $retorno->delete();
            return redirect('retorno')->with('success', 'Deletado com sucesso!');
        } else {
            return redirect('retorno')->with('danger', 'Registro não encontrado!');
        }
    }
}
