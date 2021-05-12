<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EquipamentoRequest;
use App\Models\Equipamentos;
use App\Models\Fornecedor;
use App\Models\Setor;

class EquipamentoController extends Controller
{  

        public function index(Request $request) {
        $pesquisa = $request->pesquisa;

        if($pesquisa != '') {
        $equipamentos = Equipamentos::where('equipamento', 'like', "%".$pesquisa."%")->paginate(1000);

        } else {
        $equipamentos = Equipamentos::paginate(10);
        }
        return view('equipamentos.index', compact('equipamentos', 'pesquisa'));
} 
        public function novo() {
            $fornecedores = Fornecedor::select('razao_social')->get();

            $setores = Setor::select('setor')->get();

            $equipamento_proprio = Equipamentos::select('equipamento_proprio')
            ->groupBy('equipamento_proprio')
            ->get();
            $tensao = Equipamentos::select('tensao')
            ->groupBy('tensao')
            ->get();
            $manual = Equipamentos::select('manual')

            ->groupBy('manual')
            ->get();
        return view('equipamentos.form', compact('equipamento_proprio', 'tensao', 'manual', 'fornecedores', 'setores'));
        }
        public function editar($id) {

            $fornecedores = Fornecedor::select('razao_social')->get();

            $setores = Setor::select('setor')->get();

            $equipamentos = Equipamentos::find($id);
            $equipamento_proprio = Equipamentos::select('equipamento_proprio')
                                    ->groupBy('equipamento_proprio')
                                    ->get();
            $tensao = Equipamentos::select('tensao')
                                    ->groupBy('tensao')
                                    ->get();
            $manual = Equipamentos::select('manual')
                                    ->groupBy('manual')
                                    ->get();
            return view('equipamentos.form', compact('equipamentos', 'equipamento_proprio', 'tensao', 'manual', 'fornecedores', 'setores'));
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
