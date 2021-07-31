<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IndiceDesempenho;
use App\Models\Fornecedor;

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

        $cliente = IndiceDesempenho::find($id);
        return view('indice_desempenho.form');
    }
    public function salvar(ClienteRequest $request) {

        $ehvalido = $request->validated();
        if($request->id != '') {
            $cliente = IndiceDesempenho::find($request->id);
            $cliente->update($request->all());
        } else {
            $cliente = IndiceDesempenho::create($request->all());
        }

        return redirect('/indice_desempenho/editar/'. $cliente->id)->with('success', 'Salvo com sucesso!');
    }

    public function deletar(Request $request, $id) {
        $cliente = IndiceDesempenho::find($id);
        if(!empty($cliente)){
            $cliente->delete();
            return redirect('indice_desempenho')->with('success', 'Deletado com sucesso!');
        } else {
            return redirect('indice_desempenho')->with('danger', 'Registro não encontrado!');
        }
    }
}
