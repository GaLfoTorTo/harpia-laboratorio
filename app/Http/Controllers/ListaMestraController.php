<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lista_mestra;
use App\Http\Requests\ListaMestraRequest;
use App\Models\Documento;

class ListaMestraController extends Controller
{
    public function index(Request $request) {
        $pesquisa = $request->pesquisa;
        
        if($pesquisa != '') {
            $lista_mestras = Lista_mestra::where('codigo', 'like', "%".$pesquisa."%")->paginate(1000);
        } else {
            $lista_mestras = Lista_mestra::with('codigo')->paginate(10);
        }
        return view('lista_mestras.index', compact('lista_mestras','pesquisa'));
    } 
    public function novo() {
        $documentos = Documento::get();
        return view('lista_mestras.form', compact("documentos" ));
    }
    public function editar($id) {
        $lista_mestra = Lista_mestra::find($id);
        $documentos = Documento::get();
        return view('lista_mestras.form', compact('lista_mestra', 'documentos'));
    }
    public function salvar(ListaMestraRequest $request) {
        
        $ehValido = $request->validated();

        if($request->id != '') {
            $lista_mestra = Lista_mestra::find($request->id);
            $lista_mestra->update($request->all());
        } else {
            $lista_mestra = Lista_mestra::create($request->all());
        }
        return redirect('/lista_mestras/editar/'. $lista_mestra->id)->with('success', 'Salvo com sucesso!');
    }
    public function deletar($id) {
        $lista_mestra = Lista_mestra::find($id);
        if(!empty($lista_mestra)){
            $lista_mestra->delete();
            return redirect('lista_mestras')->with('success', 'Deletado com sucesso!');
        } else {
            return redirect('lista_mestras')->with('danger', 'Registro não encontrado!');
        }
    }
}
