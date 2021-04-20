<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\D_externo;

class DExternoController extends Controller
{
    public function index(Request $request) {
        $pesquisa = $request->pesquisa;

        if($pesquisa != '') {
            $documento = D_externo::where('titulo', 'like', "%".$pesquisa."%")->paginate(1000);
            $documento = D_externo::where('localizacao', 'like', "%".$pesquisa."%")->paginate(1000);
            $documento = D_externo::where('codigo', 'like', "%".$pesquisa."%")->paginate(1000);
        } else {
            $documento = D_externo::paginate(10);
        }
        $documento = D_externo::paginate();

        return view('documentos_externos/index', compact('documento','pesquisa'));
    } 
    public function novo() {
        return view('documentos_externos/form');
    }
    public function editar($id) {
        $documento = D_externo::find($id);
        return view('documentos_externos/form', compact('documento'));
    }
    public function salvar(Request $request) {
        //dd($request->all());
 
         if($request->hasFile('documento_temp')) {
             echo 'tem documento';
             // renomeando documento 
             $nome_documento = date('YmdHmi').'.'.$request->documento_temp->getClientOriginalExtension();
 
             $request['documento'] = '/uploads/doc_externos/' . $nome_documento;
 
             $request->documento_temp->move(public_path('uploads/doc_externos'), $nome_documento);
         }
 
         if($request->id != '') {
             $documento = D_externo::find($request->id);
             $documento->update($request->all());
         } else {
             $documento = D_externo::create($request->all());
         }
         return redirect('/documentos_externos/editar/'. $documento->id)->with('success', 'Salvo com sucesso!');
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
