<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipamentos_Insumos;

class EquipamentosInsumosController extends Controller
{  


        public $materiais = ['Consumíveis', 'Reagente', 'Insumo', 'Materiais de Referência'];
        public $materiais_referencia = ['MR', 'MRC'];
        public $produto_critico = ['Sim', 'Não'];
        public $unidade = ['mg', 'g', 'kg', 'ml', 'l', 'un'];

        public function index(Request $request) {
        $pesquisa = $request->pesquisa;

        if($pesquisa != '') {
        $equipamentos_insumos = Equipamentos_Insumos::where('equipamentos_insumos', 'like', "%".$pesquisa."%")->paginate(1000);

        } else {
        $equipamentos_insumos = Equipamentos_Insumos::paginate(10);
        }
        return view('equipamentos_insumos.index', compact('equipamentos_insumos', 'pesquisa'));
} 
        public function novo() {
        
            $materiais = $this->materiais;
            $materiais_referencia = $this->materiais_referencia;
            $produto_critico = $this->produto_critico;
            $unidade = $this->unidade;

            return view('equipamentos_insumos.form', compact('materiais', 'materiais_referencia', 'produto_critico', 'unidade'));
        }
        public function editar($id) {
            $equipamentos_insumos = Equipamentos_Insumos::find($id);
            $materiais = $this->materiais;
            $materiais_referencia = $this->materiais_referencia;
            $produto_critico = $this->produto_critico;
            $unidade = $this->unidade;

            return view('equipamentos_insumos.form', compact('equipamentos_insumos','materiais', 'materiais_referencia', 'produto_critico', 'unidade'));
        }
        public function salvar(Request $request) {
            
            if($request->id != '') {
                $equipamentos_insumos = Equipamentos_Insumos::find($request->id);
                $equipamentos_insumos->update($request->all());
            } else {
                $equipamentos_insumos = Equipamentos_Insumos::create($request->all());
            }
            return redirect('/equipamentos_insumos/editar/'. $equipamentos_insumos->id)->with('success', 'Salvo com sucesso!');
        }
        public function deletar($id) {
            $equipamentos_insumos = Equipamentos_Insumos::find($id);
            if(!empty($equipamentos_insumos)){
                $equipamentos_insumos->delete();
                return redirect('equipamentos_insumos')->with('success', 'Deletado com sucesso!');
            } else {
                return redirect('equipamentos_insumos')->with('danger', 'Registro não encontrado!');
            }
    }
    public function list() {
        $equipamentos_insumos = Equipamentos_Insumos::paginate();

        return response()->json($equipamentos_insumos, 200);
    }
        
}
