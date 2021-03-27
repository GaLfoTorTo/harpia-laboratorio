<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipamentos;

class EquipamentoController extends Controller
{  

        public function index(Request $request) {
        $pesquisa = $request->pesquisa;

        if($pesquisa != '') {
        $equipamentos = Equipamentos::where('equipamento', 'like', "%".$pesquisa."%")->paginate(1000);
        } else {
        $equipamentos = Equipamentos::paginate(10);
        }
        return view('equipamentos.index', compact('equipamentos'));
} 
        public function novo() {
            return view('equipamentos.form');
        }
        public function editar($id) {
            $equipamentos = Equipamentos::find($id);
            return view('equipamentos.form', compact('equipamentos'));
        }
        public function salvar(Request $request) {
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
