<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\D_externo;

class DExternoController extends Controller
{
    public function index(Request $request) {
        $pesquisa = $request->pesquisa;

        if($pesquisa != '') {
            $documento = D_externo::where('nome', 'like', "%".$pesquisa."%")->paginate(1000);
        } else {
            $documento = D_externo::paginate(10);
        }
        return view('documentos_externos/index', compact('documento'));
    } 
    public function novo() {
        return view('documentos_externos/form');
    }
    public function editar($id) {
        $documento = D_externo::find($id);
        return view('documentos_externos/form', compact('documento'));
    }
    public function salvar(Request $request) {
        if($request->id != '') {
            $documento = D_externo::find($request->id);
            $documento->update($request->all());
        } else {
            $documento = D_externo::create($request->all());
        }
        return redirect('documentos_externos/editar/'. $documento->id)->with('success', 'Salvo com sucesso!');
    }
    public function deletar($id) {
        $documento = D_externo::find($id);
        if(!empty($documento)){
            $documento->delete();
            return redirect('documentos_externos')->with('success', 'Deletado com sucesso!');
        } else {
            return redirect('documentos_externos')->with('danger', 'Registro não encontrado!');
        }
    }
}
