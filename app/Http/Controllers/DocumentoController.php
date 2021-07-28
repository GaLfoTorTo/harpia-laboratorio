<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documento;
use App\Models\Setor;

class DocumentoController extends Controller
{
    public $tipo = ['Manual','Procedimento','Anexo','Instrução de uso/trabalho','Formulário'];
    public function index(Request $request) {
        $pesquisa = $request->pesquisa;

        if($pesquisa != '') {
            $documento = Documento::where('titulo', 'like', "%".$pesquisa."%")
                                  ->orWhere('revisao_edicao_n', 'like', "%".$pesquisa."%")
                                  ->orWhere('codigo', 'like', "%".$pesquisa."%") 
                                  ->orWhere('localizacao', 'like', "%".$pesquisa."%") 
                                  ->orWhere('data_da_atualizacao', 'like', "%".$pesquisa."%") 
                                  ->orWhere('analise_critica_verificacao', 'like', "%".$pesquisa."%")  
                                  ->orWhere('atualizacao_em', 'like', "%".$pesquisa."%") 
                                  ->orWhere('n_de_exemplares', 'like', "%".$pesquisa."%") 
                                  ->orWhere('documento', 'like', "%".$pesquisa."%") 
                                  ->orWhere('tipo', 'like', "%".$pesquisa."%") 
                                  ->orWhere('revisao_edicao', 'like', "%".$pesquisa."%")
                                  ->orWhere('data_aprovacao', 'like', "%".$pesquisa."%")
                                  ->orWhere('num_copias', 'like', "%".$pesquisa."%") ->paginate(1000);                                                              

        } else {
            $documento = Documento::paginate(10);
        }
        if($request->is('api/documentos')){
            return response()->json([$documento],200);
        }else{
            return view('documento/index', compact('documento', 'pesquisa'));
        }
    } 
    public function novo(Request $request) { 
    
        $setores = Setor::select('setor')->get();
        $tipo = $this->tipo;
        if($request->path == `api/documentos/novo`){
            return response()->json([$setores], 200);
        }else{
            return view('documento/form', compact('setores', 'tipo'));
        }

    }
    public function editar($id) {
        $tipo = ['Manual','Procedimento','Anexo','Instrução de uso/trabalho','Formulário'];
        $setores = Setor::select('setor')->get();
        $documento = Documento::find($id);
        $tipo = $this->tipo;
        return view('documento/form', compact('documento', 'setores', 'tipo'));
    }
    public function salvar(Request $request) {
 
        if($request->hasFile('documento_temp')) {
            // renomeando documento 
            $nome_documento = date('YmdHmi').'.'.$request->documento_temp->getClientOriginalExtension();
            $request['documento'] = '/uploads/documento/' . $nome_documento;
            ($request->documento);
            $request->documento_temp->move(public_path('uploads/documento'), $nome_documento);
        }

        if($request->id != '') {
            $documento = Documento::find($request->id);
                $documento->update($request->all());
        } else {
            $documento = Documento::create($request->all());
        }
        if($request->path == `api/documentos/salvar`){
            return response()->json(['success' => 'Deletado com sucesso!'], 200);
        }else{
            return redirect('/documento/editar/'. $documento->id)->with('success', 'Salvo com sucesso!');
        }
    }
 
    public function deletar(Request $request, $id) {
        $documento = Documento::find($id);
        if(!empty($documento)){
            $documento->delete();
            if($request->path == `api/documentos/deletar/${id}`){
                return response()->json(['success' => 'Deletado com sucesso!'], 200);
            }else{
                return redirect('documento')->with('success', 'Deletado com sucesso!');
            }
        } else {
            if($request->path == `api/documentos/deletar/${id}`){
                return response()->json(['error' => 'Registro não encontrado!'], 404);
            }else{
                return redirect('documento')->with('danger', 'Registro não encontrado!');
            }
        }
    }
    // public $tipos = ['Manual','Procedimento','Anexo','Instrução de uso/trabalho','Formulário'];

    // public function index(Request $request) {
    //     $pesquisa = $request->pesquisa;

    //     if($pesquisa != '') {
    //         $documento = Documentos_internos::where('nome', 'like', "%".$pesquisa."%")->paginate(1000);
    //     } else {
    //         $documento = Documentos_internos::paginate(10);
    //     }
    //     return view('documento\index', compact('documento'));
    // } 
    // public function novo() {
    //     $tipos = $this->tipos;
    //     return view('documento\form', compact('tipos'));
    // }
    // public function editar($id) {
    //     $tipos = $this->tipos;
    //     $documento = Documento::find($id);
    //     return view('documento\form', compact('documento', 'tipos'));
    // }
    // public function salvar(Request $request) {
    //    // dd($request->all());

    //     if($request->hasFile('documento_temp')) {
    //         echo 'tem documento';
    //         // renomeando documento 
    //         $nome_documento = date('YmdHmi').'.'.$request->documento_temp->getClientOriginalExtension();

    //         $request['documento'] = '/uploads/documento/' . $nome_documento;

    //         $request->documento_temp->move(public_path('uploads/documento'), $nome_documento);
    //     }

    //     if($request->id != '') {
    //         $documento = Documento::find($request->id);
    //         $documento->update($request->all());
    //     } else {
    //         $documento = Documento::create($request->all());
    //     }
    //     return redirect('/documento/editar/'. $documento->id)->with('success', 'Salvo com sucesso!');
    // }

    // public function deletar($id) {
    //     $documento = Documento::find($id);
    //     if(!empty($documento)){
    //         $documento->delete();
    //         return redirect('documento')->with('success', 'Deletado com sucesso!');
    //     } else {
    //         return redirect('documento')->with('danger', 'Registro não encontrado!');
    //     }
    // }
}

