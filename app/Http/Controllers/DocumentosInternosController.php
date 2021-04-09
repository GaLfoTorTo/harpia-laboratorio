<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\documentos_internos;

class DocumentosInternosController extends Controller
{   

    public $tipos = ['Manual','Procedimento','Anexo','Instrução de uso/trabalho','Formulário'];

    public function index(Request $request) {
        $pesquisa = $request->pesquisa;

        if($pesquisa != '') {
            $documento = documentos_internos::where('nome', 'like', "%".$pesquisa."%")->paginate(1000);
        } else {
            $documento = documentos_internos::paginate(10);
        }
        return view('documentos_internos\index', compact('documento'));
    } 
    public function novo() {
        $tipos = $this->tipos;
        return view('documentos_internos\form', compact('tipos'));
    }
    public function editar($id) {
        $tipos = $this->tipos;
        $documento = documentos_internos::find($id);
        return view('documentos_internos\form', compact('documento', 'tipos'));
    }
    public function salvar(Request $request) {
        if($request->id != '') {
            $documento = documentos_internos::find($request->id);
            $documento->update($request->all());
        } else {
            $documento = documentos_internos::create($request->all());
        }
        return redirect('/documentos_internos/editar/'. $documento->id)->with('success', 'Salvo com sucesso!');
    }
    public function  salvarimg(Request $request){
        if($request->hasFile('img')){
        $image = $request->file('img');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/img');
        $image->move($destinationPath, $name);

            $galery->img = $name;
            $galery->save();
        }
    }

    public function deletar($id) {
        $documento = documentos_internos::find($id);
        if(!empty($documento)){
            $documento->delete();
            return redirect('documentos_internos')->with('success', 'Deletado com sucesso!');
        } else {
            return redirect('documentos_internos')->with('danger', 'Registro não encontrado!');
        }
    }
}
