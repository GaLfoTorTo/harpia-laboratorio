<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SetoresRequest;
use App\Models\Setor;

class SetoresController extends Controller
{
    
    public function index(Request $request) {
        $pesquisa = $request->pesquisa;

        if($pesquisa != '') {
            $setores = Setor::with('setor_pai', 'filhos')
                                    ->where('setor','like', "%".$pesquisa."%")
                                    ->orWhereHas('setor_pai', function($query) use ($pesquisa){
                                        $query->where('setor','like', "%".$pesquisa."%");
                                    })
                                    ->paginate(1000);
        } else {
            $setores = Setor::with('setor_pai','filhos')->paginate(10);
        }
        if($request->is('api/setores')){
            return response()->json([$setores],200);
        }else{
            return view('setores.index', compact('setores','pesquisa'));
        }
    }
    public function novo(Request $request) {
       
        $setores = Setor::with('setor_pai','filhos')->get();
        if($request->is('api/setores/novo')){
            return response()->json([$setores],200);
        }else{
            return view('setores.form', compact('setores'));
        }
    }
    public function salvar(SetoresRequest $request) {
        
        $ehValido = $request->validated();
        $message = '';

        if($request->id == '') {
            $setor = Setor::create($request->all());
            $message = 'Salvo com sucesso';
        } else {
            $message = 'Alterado com sucesso'; 
            $setor = Setor::find($request->id);
            $setor->update($request->all());
        }
        if($request->is('api/setores/salvar')){
            return response()->json(['success' => 'Salvo com sucesso!'],200);
        }else{
            return redirect('setores/editar/' . $setor->id)->with('success', $message);
        }
    } 
    public function editar($id) {
        $setores = Setor::select('id', 'setor')->get();
        $setor = Setor::find($id);
        return view('setores.form', compact('setor', 'setores'));
    }
    public function deletar(Request $request, $id) {
        $setor = Setor::find($id);
       
        if($setor->filhos->count() == 0 )
        {
            $setor->delete();
            if($request->path == `api/setores/deletar/${id}`){
                return response()->json(['sucesso' => 'Deletado com sucesso!'], 200);
            }else{
                return redirect('setores')->with('success', 'Deletado com sucesso!');
            }
        }else {
            if($request->path == `api/setores/deletar/${id}`){
                return response()->json(['error' => 'Não é possível deletar!'], 404);
            }else{
                return redirect('setores')->with('danger', 'Não é possível deletar!');
            }
        }

    }
}
