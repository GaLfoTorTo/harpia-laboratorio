<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EquipamentoRequest;
use App\Models\Equipamentos;
use App\Models\Fornecedor;
use App\Models\Setor;

class EquipamentoController extends Controller
{  
        public $equipamento_proprio = ['Sim','não'];
        public $tensao = ['110','220','bivolt'];
        public $manual = ['Sim','Não'];

        public $equipamento_proprio = ['Sim', 'Não'];
        public $tensao = ['110', '220'];
        public $manual = ['Sim', 'Não'];

        public function index(Request $request) {
        $pesquisa = $request->pesquisa;

        if($pesquisa != '') {
        $equipamentos = Equipamentos::where('equipamento', 'like', "%".$pesquisa."%")
                                      ->orWhere('marca', 'like', "%".$pesquisa."%")
                                      ->orWhere('modelo', 'like', "%".$pesquisa."%")
                                      ->orWhere('fabricante', 'like', "%".$pesquisa."%")
                                      ->orWhere('fornecedor', 'like', "%".$pesquisa."%")->paginate(1000);

        
        } else {
        $equipamentos = Equipamentos::with('fornecedor')->paginate(10);
        }
        return view('equipamentos_medicao.index', compact('equipamentos', 'pesquisa'));
} 
        public function novo() {
<<<<<<< HEAD
            $fornecedores = Fornecedor::select('razao_social')->get();

            $setores = Setor::select('setor')->get();

            $equipamento_proprio = $this->equipamento_proprio;
            $tensao = $this->tensao;
            $manual = $this->manual;

        return view('equipamentos.form', compact('equipamento_proprio', 'tensao', 'manual', 'fornecedores', 'setores'));
        }
        public function editar($id) {

            $fornecedores = Fornecedor::select('razao_social')->get();

            $setores = Setor::select('setor')->get();

            $equipamentos = Equipamentos::find($id);
            $equipamento_proprio = $this->equipamento_proprio;
            $tensao = $this->tensao;
            $manual = $this->manual;

            return view('equipamentos.form', compact('equipamentos', 'equipamento_proprio', 'tensao', 'manual', 'fornecedores', 'setores'));
=======
            $fornecedores = Fornecedor::select('id','razao_social')->get();
            $setor = Setor::select('id','setor')->get();
            $equipamento_proprio = $this->equipamento_proprio;
            $tensao = $this->tensao;
            $manual = $this->manual;
        return view('equipamentos_medicao.form', compact('equipamento_proprio', 'tensao', 'manual', 'fornecedores', 'setor'));
        }
        public function editar($id) {

            $equipamentos = Equipamentos::find($id);
            $fornecedores = Fornecedor::select('id','razao_social')->get();
            $setor = Setor::select('id','setor')->get();
            $equipamento_proprio = $this->equipamento_proprio;
            $tensao = $this->tensao;
            $manual = $this->manual;
            return view('equipamentos_medicao.form', compact('equipamentos', 'equipamento_proprio', 'tensao', 'manual', 'fornecedores', 'setor'));
>>>>>>> 28d920a187d56c4018474835ac2699507944170b
        }
        public function salvar(EquipamentoRequest $request) {

            $ehvalido = $request->validated();

            if($request->id != '') {
                $equipamentos = Equipamentos::find($request->id);
                $equipamentos->update($request->all());
            } else {
                $equipamentos = Equipamentos::create($request->all());
            }
            return redirect('/equipamentos/editar/'. $equipamentos->id)->with('success', 'Salvo com sucesso!');
        }
        public function deletar($id) {
            $equipamentos = Equipamentos::find($id);
            if(!empty($equipamentos)){
                $equipamentos->delete();
                return redirect('equipamentos')->with('success', 'Deletado com sucesso!');
            } else {
                return redirect('equipamentos')->with('danger', 'Registro não encontrado!');
            }
    }
    public function list() {
        $equipamentos = Equipamentos::paginate();

        return response()->json($equipamentos, 200);
    }
        
}
