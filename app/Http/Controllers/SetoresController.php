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
            $setores = Setor::where('setor', 'like', "%".$pesquisa."%")->paginate(1000);
        } else {
            $setores = Setor::paginate(10);
        }
        $setores = Setor::paginate();

        return view('setores.index', compact('setores','pesquisa'));
    }
    public function novo() {
       

        return view('setores.form');
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
        return redirect('setores/editar/' . $setor->id)->with('success', $message);
    } 
    public function editar($id) {
        $setor = Setor::find($id);
        return view('setores.form');
    }
    public function deletar($id) {
        $setor = Setor::find($id);
        $setor->delete();

        return redirect('setores')->with('success', 'Deletado com sucesso!');
    }
}
