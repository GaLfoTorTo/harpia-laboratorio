<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colaborador;

class ColaboradorController extends Controller
{
    public function index(Request $request) {
        $pesquisa = $request->pesquisa;

        if($pesquisa != '') {
            $fornecedores = Cliente::where('nome', 'like', "%".$pesquisa."%")->paginate(1000);
        } else {
            $fornecedores = Cliente::paginate(10);
        }
        return view('fornecedores.index', compact('fornecedores'));
    } 
    public function novo() {
        return view('fornecedores.form');
    }
    public function editar($id) {
        $cliente = Cliente::find($id);
        return view('fornecedores.form', compact('cliente'));
    }
    public function salvar(Request $request) {
        if($request->id != '') {
            $cliente = Cliente::find($request->id);
            $cliente->update($request->all());
        } else {
            $cliente = Cliente::create($request->all());
        }
        return redirect('/fornecedores/editar/'. $cliente->id)->with('success', 'Salvo com sucesso!');
    }
    public function deletar($id) {
        $cliente = Cliente::find($id);
        if(!empty($cliente)){
            $cliente->delete();
            return redirect('fornecedores')->with('success', 'Deletado com sucesso!');
        } else {
            return redirect('fornecedores')->with('danger', 'Registro não encontrado!');
        }
    }
}