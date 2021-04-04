<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servico;

class ServicoController extends Controller
{
    public $tipo_material = ['MR', 'MRC'];
    public $tipo_servico = ['Manutenção corretiva', 'Manutenção preventiva', 'Calibração', 'Qualificação', 'Auditoria', 'Consultoria', 'Manutenção predial', 'Terceirização'];

    public function index() {
        $servicos = Servico::paginate();

        return view('servicos.index', compact('servicos'));
    }
    public function novo() {
        $tipo_material = $this->tipo_material;
        $tipo_servico = $this->tipo_servico;
        
        return view('servicos.form', compact('tipo_material', 'tipo_servico'));
    }
    public function salvar(Request $request) {
        if($request->id == '') {
            $servico = Servico::create($request->all());
        } else {
            $servico = Servico::find($request->id);
            $servico->update($request->all());
        }
        return redirect('servicos/editar/' . $servico->id)->with('success', 'Alterado com sucesso!');
    } 
    public function editar($id) {
        $servico = Servico::find($id);
        $tipo_material = $this->tipo_material;
        $tipo_servico = $this->tipo_servico;
        
        return view('servicos.form', compact('servico','tipo_material', 'tipo_servico'));
    }
    public function deletar($id) {
        $servico = Servico::find($id);
        $servico->delete();

        return redirect('servicos')->with('success', 'Deletado com sucesso!');
    }
}
