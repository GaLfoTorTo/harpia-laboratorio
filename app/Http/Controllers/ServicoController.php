<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ServicoRequest;
use App\Models\Servico;

class ServicoController extends Controller
{
    public $tipo_material = ['MR', 'MRC'];
    public $tipo_servico = ['Manutenção corretiva', 'Manutenção preventiva', 'Calibração', 'Qualificação', 'Auditoria', 'Consultoria', 'Manutenção predial', 'Terceirização'];

    public function index(Request $request) {
        $pesquisa = $request->pesquisa;

        if($pesquisa != '') {
            $servicos = Servico::where('descricao', 'like', "%".$pesquisa."%")
            ->orWhere('tipo_servico','like', "%".$pesquisa."%")
            ->orWhere('tipo_material','like', "%".$pesquisa."%")
            ->orWhere('servico_critico','like', "%".$pesquisa."%")
            ->paginate(1000);
        } else {
            $servicos = Servico::paginate(10);
        }
      
        if($request->is('api/servicos')){
            return response()->json([$servicos],200);
        }else{
            return view('servicos.index', compact('servicos','pesquisa'));
        }
    }
    public function novo() {
        $tipo_material = $this->tipo_material;
        $tipo_servico = $this->tipo_servico;
        
        return view('servicos.form', compact('tipo_material', 'tipo_servico'));
    }
    public function salvar(ServicoRequest $request) {

        $ehValido = $request->validated();
        $message = '';

        if($request->id == '') {
            $servico = Servico::create($request->all());
            $message = 'Salvo com sucesso';
        } else {
            $message = 'Alterado com sucesso'; 
            $servico = Servico::find($request->id);
            $servico->update($request->all());
        }
        if($request->is('api/servicos/salvar')){
            return response()->json(['success' => 'Salvo com sucesso!'],200);
        }else{
            return redirect('servicos/editar/' . $servico->id)->with('success', $message);
        }
    } 
    public function editar($id) {
        $servico = Servico::find($id);
        $tipo_material = $this->tipo_material;
        $tipo_servico = $this->tipo_servico;
        
        return view('servicos.form', compact('servico','tipo_material', 'tipo_servico'));
    }
    public function deletar(Request $request, $id) {
        $servico = Servico::find($id);
        if(!empty($servico)){
            $servico->delete();
            if($request->path == `api/servicos/deletar/${id}`){
                return response()->json(['success' => 'Deletado com sucesso!'], 200);
            }else{
                return redirect('servicos')->with('success', 'Deletado com sucesso!');
            }
        } else {
            if($request->path == `api/servicos/deletar/${id}`){
                return response()->json(['error' => 'Registro não encontrado!'], 404);
            }else{
                return redirect('servicos')->with('danger', 'Registro não encontrado!');
            }
        }
    }
}
