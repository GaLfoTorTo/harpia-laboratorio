<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colaborador;

class ColaboradorController extends Controller
{
    public function index(Request $request){
        $pesquisa = $request->pesquisa;

        if($pesquisa != ''){
            $colaboradores = Colaborador::where('nome', 'like', "%".$pesquisa."%")->paginate(1000);
        }else {
            $colaboradores = Colaborador::paginate(10);
        }
        return view('colaboradores.index', compact('colaboradores', 'pesquisa'));
    }

    public function novo(){
        return view('colaboradores.form');
    }

    public function editar($id){
        $colaborador = Colaborador::find($id);
        return view('colaboradores.form', compact('colaborador'));
    }

    public function salvar(Request $request){
        if($request->id != ''){
            $colaborador = Colaborador::find($request->id);
            $colaborador->update($request->all());
        }else {
            $colaborador = Colaborador::create($request->all());
        }
        return redirect('/colaboradores/editar/'.$colaborador->id)->with('success', 'Salvo com sucesso!');
    }

    public function deletar($id){
        $colaborador = Colaborador::find($id);
        if(!empty($colaborador)){
            $colaborador->delete();
            return redirect('colaboradores')->with('success', 'Deletado com sucesso!');
        }else{
            return redirect('colaboradores')->with('danger', 'Registro não encontrado!');
        }
    }
}
