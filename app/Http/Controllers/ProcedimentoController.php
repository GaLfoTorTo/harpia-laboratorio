<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProcedimentoRequest;
use App\Models\Procedimento;

class ProcedimentoController extends Controller
{
    
    public function index(Request $request) {
        $pesquisa = $request->pesquisa;

        if($pesquisa != '') {
            $procedimento = Procedimento::where('rev', 'like', "%".$pesquisa."%")
                                        ->orWhere('data', 'like', "%".$pesquisa."%") 
                                        ->orWhere('analista', 'like', "%".$pesquisa."%") 
                                        ->orWhere('lote', 'like', "%".$pesquisa."%") 
                                        ->orWhere('responsavel', 'like', "%".$pesquisa."%") ->paginate(1000);
                                                                   
        } else {
            $procedimento = Procedimento::paginate(10);
        }
        $procedimento = Procedimento::paginate();

        return view('procedimento.index', compact('procedimento','pesquisa'));
    }
    public function novo() {
                
        return view('procedimento.form');
    }
    public function salvar(ProcedimentoRequest $request) {

        $ehValido = $request->validated();
        $message = '';

        if($request->id == '') {
            $procedimento = Procedimento::create($request->all());
            $message = 'Salvo com sucesso';
        } else {
            $message = 'Alterado com sucesso'; 
            $procedimento = Procedimento::find($request->id);
            $procedimento->update($request->all());
        }
        return redirect('procedimento/editar/' . $procedimento->id)->with('success', $message);
    } 
    public function editar($id) {
        $procedimento = Procedimento::find($id);
       
        
        return view('procedimento.form', compact('procedimento'));
    }
    public function deletar($id) {
        $procedimento = Procedimento::find($id);
        $procedimento->delete();

        return redirect('procedimento')->with('success', 'Deletado com sucesso!');
    }
}
