<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FornecedorRequest;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    public $tipos = ['servico', 'produto' ];

    public function index(Request $request) {
        $pesquisa = $request->pesquisa;
        
        if($pesquisa != '') {
            $fornecedores = Fornecedor::where('metodos_definidos', 'like', "%".$pesquisa."%")->paginate(1000);
        } else {
            $fornecedores = Fornecedor::paginate(10);
        }
        if($request->is('api/fornecedores')){
            return response()->json([$fornecedores],200);
        }else{
            return view('fornecedores.index', compact('fornecedores'));
        }
    } 
    public function novo() {
        $tipos = $this->tipos;
        return view('fornecedores.form', compact('tipos'));
    }
    public function editar($id) {
        $tipos = $this->tipos;
        $fornecedor = Fornecedor::find($id);
        return view('fornecedores.form', compact('fornecedor', 'tipos'));
    }
    public function salvar(FornecedoresRequest $request) {
        
        $ehValido = $request->validated();

        if($request->id != '') {
            $fornecedor = Fornecedor::find($request->id);
            $fornecedor->update($request->all());
        } else {
            $fornecedor = Fornecedor::create($request->all());
        }
        return redirect('/fornecedores/editar/'. $fornecedor->id)->with('success', 'Salvo com sucesso!');
    }
    public function deletar(Request $request, $id) {
        $fornecedor = Fornecedor::find($id);
        if(!empty($fornecedor)){
            $fornecedor->delete();
            if($request->path == `api/fornecedores/deletar/${id}`){
                return response()->json(['sucesso' => 'Deletado com sucesso!'], 200);
            }else{
                return redirect('fornecedores')->with('success', 'Deletado com sucesso!');
            }
        } else {
            if($request->path == `api/fornecedores/deletar/${id}`){
                return response()->json(['error' => 'Registro não encontrado!'], 404);
            }else{
                return redirect('fornecedores')->with('danger', 'Registro não encontrado!');
            }
        }
    }
}
