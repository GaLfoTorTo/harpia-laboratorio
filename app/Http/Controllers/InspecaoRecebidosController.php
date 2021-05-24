<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inspecao_recebidos;
use App\Models\Perguntas_lista_inspecao;
use App\Models\Respostas_lista_inspecao;
use App\Models\Fornecedor;
use App\Models\Equipamentos_insumos;
use App\Http\Requests\Inspecao_recebidosRequest;


class InspecaoRecebidosController extends Controller
{
    public function index(Request $request) {
        $pesquisa = $request->pesquisa;

        if($pesquisa != '') {
            $inspecao_recebidos = Inspecao_recebidos::where('produto', 'like', "%".$pesquisa."%")->paginate(1000);
        } else {
            $inspecao_recebidos = Inspecao_recebidos::with('produto','fornecedor')->paginate(10);
        }
        return view('inspecao_recebidos.index', compact('inspecao_recebidos','pesquisa'));
    } 
    public function novo() {
        $pergunta = Perguntas_lista_inspecao::get();
        $fornecedor = Fornecedor::select('nome_fantasia', 'id')->get();
        $produto = Equipamentos_Insumos::select('nome', 'id')->get();
        return view('inspecao_recebidos.form', compact('pergunta','fornecedor', 'produto'));
    }
    public function editar($id) {
        $pergunta = Perguntas_lista_inspecao::get();
        $inspecao_recebidos = Inspecao_recebidos::find($id);
        $fornecedor = Fornecedor::select('nome_fantasia', 'id')->get();
        $resposta = Respostas_lista_inspecao::select('pergunta_id','resposta')->get();
        $produto = Equipamentos_Insumos::select('nome', 'id')->get();
        return view('inspecao_recebidos.form', compact('inspecao_recebidos','pergunta','fornecedor', 'produto','resposta'));
    }
    public function salvar(Inspecao_recebidosRequest $request) {
        $ehvalido = $request->validated();
        
        if($request->id != '') {
            $inspecao_recebidos = Inspecao_recebidos::find($request->id);
            $resposta_lista_inspecao = Respostas_lista_inspecao::find($request->id);
            $inspecao_recebidos = Inspecao_recebidos::update($request->id);

            foreach ($request->resposta as $key => $value) {
                $respostas['inspecao_id'] = $resposta_lista_inspecao->id;
                $respostas['pergunta_id'] = $key;
                $respostas['resposta'] = $value;
                $resposta_lista_inspecao = Respostas_lista_inspecao::update($resposta);
            }
        } else {
            $campos_inspecao = [
                $request->fornecedor_id, $request->fabricante,
                $request->nota_fiscal, $request->lote, 
                $request->descricao_teste, $request->insumo_liberado,
                $request->justificativa
            ];
            $inspecao_recebidos = Inspecao_recebidos::create($campos_inspecao);
            foreach ($request->resposta as $key => $value) {
                $respostas['inspecao_id'] = $inspecao_recebidos->id;
                $respostas['pergunta_id'] = $key;
                $respostas['resposta'] = $value;
                $resposta_lista_inspecao = Respostas_lista_inspecao::create($respostas);
            }
        }
        return redirect('/inspecao_recebidos/editar/'. $inspecao_recebidos->id)->with('success', 'Salvo com sucesso!');
    }
    public function deletar($id) {
        $inspecao_recebidos = Inspecao_recebidos::find($id);
        if(!empty($inspecao_recebidos)){
            $inspecao_recebidos->delete();
            return redirect('inspecao_recebidos')->with('success', 'Deletado com sucesso!');
        } else {
            return redirect('inspecao_recebidos')->with('danger', 'Registro não encontrado!');
        }
    }
}
