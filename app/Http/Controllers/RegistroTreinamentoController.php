<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegistroTreinamentoRequest;
use App\Models\RegistroTreinamento;

class RegistroTreinamentoController extends Controller
{  

        public function index(Request $request) {
        $pesquisa = $request->pesquisa;

        if($pesquisa != '') {
        $registro_treinamento = RegistroTreinamento::where('titulo', 'like', "%".$pesquisa."%")
                                                     ->orWhere('carga_horaria', 'like', "%".$pesquisa."%")
                                                     ->orWhere('data_inicial', 'like', "%".$pesquisa."%") 
                                                     ->orWhere('data_final', 'like', "%".$pesquisa."%")->paginate(1000);
        
        } else {
        $registro_treinamento = RegistroTreinamento::paginate(10);
        }
        return view('registro_treinamento.index', compact('registro_treinamento', 'pesquisa'));
} 
        public function novo() {
        return view('registro_treinamento.form');
        }

        public function editar($id) {

            $registro_treinamento = RegistroTreinamento::select('titulo', 'carga_horaria', 'data_inicial','data_final', 'conteudo')->get();

            $registro_treinamento = RegistroTreinamento::find($id);
            return view('registro_treinamento.form', compact('registro_treinamento'));
        }

        public function salvar(Request $request) {

            //$ehvalido = $request->validated();

            if($request->id != '') {
                $registro_treinamento = RegistroTreinamento::find($request->id);
                $registro_treinamento->update($request->all());
            } else {
                $registro_treinamento = RegistroTreinamento::create($request->all());
            }
            return redirect('/registro_treinamento/editar/'. $registro_treinamento->id)->with('success', 'Salvo com sucesso!');
        }
        public function deletar($id) {
            $registro_treinamento = RegistroTreinamento::find($id);
            if(!empty($registro_treinamento)){
                $registro_treinamento->delete();
                return redirect('registro_treinamento')->with('success', 'Deletado com sucesso!');
            } else {
                return redirect('registro_treinamento')->with('danger', 'Registro não encontrado!');
            }
    }
    public function list() {
        $registro_treinamento = RegistroTreinamento::paginate();

        return response()->json($registro_treinamento, 200);
    }
        
}
