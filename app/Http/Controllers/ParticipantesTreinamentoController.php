<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ParticipantesResquest;
use App\Models\ParticipantesTreinamento;
use App\Models\RegistroTreinamento;
use App\Models\Setor;
use App\Models\Colaborador;


class ParticipantesTreinamentoController extends Controller
{  

        public function index(Request $request) {
            $pesquisa = $request->pesquisa;
            $treinamento_id = $request->treinamento_id;
            $treinamento = RegistroTreinamento::find($treinamento_id);

            if($pesquisa != '') {
            $participantes_treinamento = ParticipantesTreinamento::with('treinamento')->where('numero', 'like', "%".$pesquisa."%")
            ->where('registro_treinamento_id','=', $treinamento_id)
                                                                   ->orWhere('setor', 'like', "%".$pesquisa."%")
                                                                   ->orWhere('nome', 'like', "%".$pesquisa."%")
                                                                   ->paginate(1000);
            
            } else {
            $participantes_treinamento = ParticipantesTreinamento::where('registro_treinamento_id','=', $treinamento_id)->paginate(10);
            }
            return view('participantes_treinamento.index', compact('participantes_treinamento', 'pesquisa', 'treinamento'));
        } 
        public function novo(Request $request) {

            $treinamento_id = $request->treinamento_id;
            if($treinamento_id != '') {
                $treinamento = RegistroTreinamento::find($treinamento_id);
            } else {
                $treinamento = '';
            }
            $setores = Setor::select('setor')->get();
            $colaboradores = Colaborador::select('nome')->get();

            $nome = ParticipantesTreinamento::select('nome')
            ->groupBy('nome')
            ->get();
        return view('participantes_treinamento.form', compact('setores','colaboradores', 'nome', 'treinamento'));
        }
        public function editar($id) {

            $setores = Setor::select('setor')->get();
            $colaboradores = Colaborador::select('nome')->get();

            $participantes_treinamento = ParticipantesTreinamento::find($id);
            $treinamento = RegistroTreinamento::find($participantes_treinamento->registro_treinamento_id);

            $nome = ParticipantesTreinamento::select('nome')
                                    ->groupBy('nome')
                                    ->get();

            return view('participantes_treinamento.form', compact('setores','colaboradores', 'participantes_treinamento', 'nome', 'treinamento'));
        }
        public function salvar(ParticipantesResquest $request) {

            $ehvalido = $request->validated();

            if($request->id != '') {
                $participantes_treinamento = ParticipantesTreinamento::find($request->id);
                $participantes_treinamento->update($request->all());
            } else {
                $participantes_treinamento = ParticipantesTreinamento::create($request->all());
            }
            return redirect('/participantes_treinamento/editar/'. $participantes_treinamento->id)->with('success', 'Salvo com sucesso!');
        }
        public function deletar($id) {
            $participantes_treinamento = ParticipantesTreinamento::find($id);
            if(!empty($participantes_treinamento)){
                $participantes_treinamento->delete();
                return redirect('participantes_treinamento')->with('success', 'Deletado com sucesso!');
            } else {
                return redirect('participantes_treinamento')->with('danger', 'Registro não encontrado!');
            }
    }
    public function list() {
        $participantes_treinamento = ParticipantesTreinamento::paginate();

        return response()->json($participantes_treinamento, 200);
    }
        
}
