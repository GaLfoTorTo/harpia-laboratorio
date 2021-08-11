<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IndiceDesempenho;
use App\Models\Fornecedor;
use App\Http\Requests\IndiceDesempenhoRequest;

class IndiceDesempenhoController extends Controller
{
    public function index(Request $request) {
        $pesquisa = $request->pesquisa;

        if($pesquisa != '') {
            $indice_desempenho = IndiceDesempenho::where('nome', 'like', "%".$pesquisa."%")->paginate(1000);
        } else {
            $indice_desempenho = IndiceDesempenho::with('fornecedores')->paginate(10);
        }
        
        return view('indice_desempenho.index', compact('indice_desempenho','pesquisa'));
    } 
    public function novo() {

        $fornecedores = Fornecedor::class::get();

        return view('indice_desempenho.form', compact('fornecedores'));
    }
    public function editar($id) {

        $indice_desempenho = IndiceDesempenho::find($id);
        $fornecedores = Fornecedor::class::get();

        return view('indice_desempenho.form', compact('indice_desempenho', 'fornecedores'));
    }
    public function salvar(IndiceDesempenhoRequest $request) {
        
        $ehvalido = $request->validated();
        if($request->id != '') {
            $indice_desempenho = IndiceDesempenho::find($request->id);
            $indice_desempenho->update($request->all());
        } else {
            $indice_desempenho = IndiceDesempenho::create($request->all());
        }

        return redirect('/indice_desempenho/editar/'. $indice_desempenho->id)->with('success', 'Salvo com sucesso!');
    }

    public function deletar(Request $request, $id) {
        $indice_desempenho = IndiceDesempenho::find($id);
        if(!empty($indice_desempenho)){
            $indice_desempenho->delete();
            return redirect('indice_desempenho')->with('success', 'Deletado com sucesso!');
        } else {
            return redirect('indice_desempenho')->with('danger', 'Registro não encontrado!');
        }
    }
}
