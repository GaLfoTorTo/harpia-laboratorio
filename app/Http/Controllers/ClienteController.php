<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
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
        $tipo_unidade = Cliente::select('tipo_unidade')
                                ->groupBy('tipo_unidade')
                                ->get();
        $responsavel_tecnico = Cliente::select('responsavel_tecnico')
                                ->groupBy('responsavel_tecnico')
                                ->get();
        $responsavel_financeiro = Cliente::select('responsavel_financeiro')
                                ->get();
        return view('clientes.form', compact('tipo_unidade', 'responsavel_tecnico', 'responsavel_financeiro'));
    }
    public function editar($id) {
        $cliente = Cliente::find($id);
        $tipo_unidade = Cliente::select('tipo_unidade')
                                ->get();
        $responsavel_tecnico = Cliente::select('responsavel_tecnico')
                                ->groupBy('responsavel_tecnico')
                                ->get();
        $responsavel_financeiro = Cliente::select('responsavel_financeiro')
                                ->groupBy('responsavel_financeiro')
                                ->get();
        return view('clientes.form', compact('cliente', 'tipo_unidade', 'responsavel_tecnico', 'responsavel_financeiro'));
    }
    public function salvar(Request $request) {
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
