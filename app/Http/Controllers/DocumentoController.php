<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Documento extends Controller
{
    //
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documento;

class Documento extends Controller
{
    public function index(Request $request) {
        $pesquisa = $request->pesquisa;

        if($pesquisa != '') {
            $documento = Documento::where('nome', 'like', "%".$pesquisa."%")->paginate(1000);
        } else {
            $documento = Documento::paginate(10);
        }
        return view('documentos/index', compact('documento'));
    } 
    public function novo() {
        return view('documentos/form');
    }
    public function editar($id) {
        $documento = Documento::find($id);
        return view('documentos/form', compact('documento'));
    }
    public function salvar(Request $request) {
 
         if($request->hasFile('documento_temp')) {
            echo 'tem documento';
             // renomeando documento 
            $nome_documento = date('YmdHmi').'.'.$request->documento_temp->getClientOriginalExtension();
 
            $request['documento'] = '/uploads/doc_externos/' . $nome_documento;
            dd($request->documento);
            $request->documento_temp->move(public_path('uploads/doc_externos'), $nome_documento);
         }
 
         if($request->id != '') {
             $documento = Documento::find($request->id);
             $documento->update($request->all());
         } else {
             $documento = Documento::create($request->all());
         }
         return redirect('/documentos_externos/editar/'. $documento->id)->with('success', 'Salvo com sucesso!');
     }
 
    public function deletar($id) {
        $documento = Documento::find($id);
        if(!empty($documento)){
            $documento->delete();
            return redirect('documento')->with('success', 'Deletado com sucesso!');
        } else {
            return redirect('documento')->with('danger', 'Registro não encontrado!');
        }

    public $tipos = ['Manual','Procedimento','Anexo','Instrução de uso/trabalho','Formulário'];

    public function index(Request $request) {
        $pesquisa = $request->pesquisa;

        if($pesquisa != '') {
            $documento = Documentos_internos::where('nome', 'like', "%".$pesquisa."%")->paginate(1000);
        } else {
            $documento = Documentos_internos::paginate(10);
        }
        return view('documento\index', compact('documento'));
    } 
    public function novo() {
        $tipos = $this->tipos;
        return view('documento\form', compact('tipos'));
    }
    public function editar($id) {
        $tipos = $this->tipos;
        $documento = Documento::find($id);
        return view('documento\form', compact('documento', 'tipos'));
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
            $documento = Documento::find($request->id);
            $documento->update($request->all());
        } else {
            $documento = Documento::create($request->all());
        }
        return redirect('/documento/editar/'. $documento->id)->with('success', 'Salvo com sucesso!');
    }

    public function deletar($id) {
        $documento = Documento::find($id);
        if(!empty($documento)){
            $documento->delete();
            return redirect('documento')->with('success', 'Deletado com sucesso!');
        } else {
            return redirect('documento')->with('danger', 'Registro não encontrado!');
        }
    }
}

