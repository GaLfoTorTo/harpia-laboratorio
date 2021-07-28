<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colaborador;
use App\Models\Setor;
use App\Http\Requests\ColaboradorRequest;

class ColaboradorController extends Controller
{
    public function index(Request $request){
        $pesquisa = $request->pesquisa;

        if($pesquisa != ''){
            $colaboradores = Colaborador::where('nome', 'like', "%".$pesquisa."%")->paginate(1000);
        }else {
            $colaboradores = Colaborador::paginate(10);
        }
        if($request->is('api/colaboradores')){
            return response()->json([$colaboradores],200);
        }else{
            return view('colaboradores.index', compact('colaboradores', 'pesquisa'));
        }
    }

    public function novo(Request $request){
        $setores = Setor::select('setor')->get();
        if($request->is('api/colaboradores/novo')){
            return response()->json([$setores],200);
        }else{
            return view('colaboradores.form', compact('setores'));
        }
    }

    public function editar($id){
        $setores = Setor::select('setor')->get();
        $colaborador = Colaborador::find($id);
        return view('colaboradores.form', compact('colaborador', 'setores'));
    }

    public function salvar(ColaboradorRequest $request){

        if($request->hasFile('foto')) {
             echo 'tem documento';
             // renomeando documento 
             $nome_documento = date('YmdHmi').'.'.$request->foto->getClientOriginalExtension();
 
             $request['user'] = '/uploads/usuario/' . $nome_documento;
 
             $request->foto->move(public_path('uploads/usuario'), $nome_documento);
         }
        
        $ehValido = $request->validated();

        if($request->id != ''){
            $colaborador = Colaborador::find($request->id);
            $colaborador->update($request->all());
        }else {
            $colaborador = Colaborador::create($request->all());
        }
        if($request->is('api/colaboradores/salvar')){
            return response()->json(['success' => 'Salvo com sucesso!'],200);
        }else{
            return redirect('/colaboradores/editar/'.$colaborador->id)->with('success', 'Salvo com sucesso!');
        }
    }

    public function deletar(Request $request, $id){
        $colaborador = Colaborador::find($id);
        if(!empty($colaborador)){
            $colaborador->delete();
            if($request->path == `api/colaboradores/deletar/${id}`){
                return response()->json(['success' => 'Deletado com sucesso!'], 200);
            }else{
                return redirect('colaboradores')->with('success', 'Deletado com sucesso!');
            }
        } else {
            if($request->path == `api/colaboradores/deletar/${id}`){
                return response()->json(['error' => 'Registro não encontrado!'], 404);
            }else{
                return redirect('colaboradores')->with('danger', 'Registro não encontrado!');
            }
        }
    }
}