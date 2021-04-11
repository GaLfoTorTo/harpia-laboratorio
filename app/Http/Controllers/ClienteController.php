<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public $tipos_unidade = ['Matriz', 'Filial'];

    public function index(Request $request) {
        $pesquisa = $request->pesquisa;

        if($pesquisa != '') {
            $clientes = Cliente::where('nome', 'like', "%".$pesquisa."%")->paginate(1000);
        } else {
            $clientes = Cliente::paginate(10);
        }
        return view('clientes.index', compact('clientes','pesquisa'));
    } 
    public function novo() {

        $tipos_unidade = $this->tipos_unidade;
        return view('clientes.form', compact('tipos_unidade'));
    }
    public function editar($id) {

        $cliente = Cliente::find($id);
        $tipos_unidade = $this->tipos_unidade;
        return view('clientes.form', compact('cliente', 'tipos_unidade'));
    }
    public function salvar(ClienteRequest $request) {

        $ehvalido = $request->validated();
        if($request->id != '') {
            $cliente = Cliente::find($request->id);
            $cliente->update($request->all());
        } else {
            $cliente = Cliente::create($request->all());
        }
        return redirect('/clientes/editar/'. $cliente->id)->with('success', 'Salvo com sucesso!');
    }
    public function deletar($id) {
        $cliente = Cliente::find($id);
        if(!empty($cliente)){
            $cliente->delete();
            return redirect('clientes')->with('success', 'Deletado com sucesso!');
        } else {
            return redirect('clientes')->with('danger', 'Registro não encontrado!');
        }
    }
}
