<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documentos_internos;

class DocumentosInternosController extends Controller
{   

    public $tipos = ['Manual','Procedimento','Anexo','Instrução de uso/trabalho','Formulário'];

    public function index(Request $request) {
        $pesquisa = $request->pesquisa;

        if($pesquisa != '') {
            $documento = Documentos_internos::where('nome', 'like', "%".$pesquisa."%")->paginate(1000);
        } else {
            $documento = Documentos_internos::paginate(10);
        }
        return view('documentos_internos\index', compact('documento'));
    } 
    public function novo() {
        $tipos = $this->tipos;
        return view('documentos_internos\form', compact('tipos'));
    }
    public function editar($id) {
        $tipos = $this->tipos;
        $documento = Documentos_internos::find($id);
        return view('documentos_internos\form', compact('documento', 'tipos'));
    }
    public function salvar(Request $request) {
       // dd($request->all());

        if($request->hasFile('documento_temp')) {
            echo 'tem documento';
            // renomeando documento 
            $nome_documento = date('YmdHmi').'.'.$request->documento_temp->getClientOriginalExtension();

            $request['documento'] = '/uploads/doc_internos/' . $nome_documento;

            $request->documento_temp->move(public_path('uploads/doc_internos'), $nome_documento);
        }

        if($request->id != '') {
            $documento = Documentos_internos::find($request->id);
            $documento->update($request->all());
        } else {
            $documento = Documentos_internos::create($request->all());
        }
        return redirect('/documentos_internos/editar/'. $documento->id)->with('success', 'Salvo com sucesso!');
    }

    public function deletar($id) {
        $documento = Documentos_internos::find($id);
        if(!empty($documento)){
            $documento->delete();
            return redirect('documentos_internos')->with('success', 'Deletado com sucesso!');
        } else {
            return redirect('documentos_internos')->with('danger', 'Registro não encontrado!');
        }
    }
}
