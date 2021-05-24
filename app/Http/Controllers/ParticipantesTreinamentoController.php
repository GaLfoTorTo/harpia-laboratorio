<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ParticipantesResquest;
use App\Models\ParticipantesTreinamento;
use App\Models\Setor;


class ParticipantesTreinamentoController extends Controller
{  

        public function index(Request $request) {
            $pesquisa = $request->pesquisa;

            if($pesquisa != '') {
            $participantes_treinamento = ParticipantesTreinamento::where('numero', 'like', "%".$pesquisa."%")
                                                                   ->orWhere('setor', 'like', "%".$pesquisa."%")
                                                                   ->orWhere('nome', 'like', "%".$pesquisa."%")
                                                                   ->orWhere('assinatura', 'like', "%".$pesquisa."%")->paginate(1000);
            
            } else {
            $participantes_treinamento = ParticipantesTreinamento::paginate(10);
            }
            return view('participantes_treinamento.index', compact('participantes_treinamento', 'pesquisa'));
        } 
        public function novo() {

            $setores = Setor::select('setor')->get();

            $nome = ParticipantesTreinamento::select('nome')
            ->groupBy('nome')
            ->get();
        return view('participantes_treinamento.form', compact('setores', 'nome'));
        }
        public function editar($id) {

            $setores = Setor::select('setor')->get();

            $participantes_treinamento = ParticipantesTreinamento::find($id);

            $nome = ParticipantesTreinamento::select('nome')
                                    ->groupBy('nome')
                                    ->get();

            return view('participantes_treinamento.form', compact('setores', 'participantes_treinamento', 'nome'));
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
