<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inspecao_recebidos;
use App\Models\Perguntas_lista_inspecao;
use App\Models\Respostas_lista_inspecao;
use App\Models\Fornecedor;
use App\Models\Equipamentos;
use App\Http\Requests\Inspecao_recebidosRequest;


class InspecaoRecebidosController extends Controller
{
    public function index(Request $request) {
        $pesquisa = $request->pesquisa;

        if($pesquisa != '') {
            $inspecao_recebidos = Inspecao_recebidos::where('produto', 'like', "%".$pesquisa."%")->paginate(1000);
        } else {
            $inspecao_recebidos = Inspecao_recebidos::with('produto')->paginate(10);
        }
        return view('inspecao_recebidos.index', compact('inspecao_recebidos','pesquisa'));
    } 
    public function novo() {
        $pergunta = Perguntas_lista_inspecao::get();
        $produto = Equipamentos::with('fornecedor')->get();
        return view('inspecao_recebidos.form', compact('pergunta','produto'));
    }
    public function editar($id) {
        $pergunta = Perguntas_lista_inspecao::get();
        $inspecao_recebidos = Inspecao_recebidos::find($id);
        $resposta = Respostas_lista_inspecao::select('pergunta_id','resposta')->get();
        $produto = Equipamentos::with('fornecedor')->get();
        return view('inspecao_recebidos.form', compact('inspecao_recebidos','pergunta','produto','resposta'));
    }
    public function salvar(Inspecao_recebidosRequest $request) {
        $ehvalido = $request->validated();
        
        if($request->id != '') {
            $inspecao_recebidos = Inspecao_recebidos::find($request->id);
            $resposta_lista_inspecao = Respostas_lista_inspecao::find($request->id);

            $campos_inspecao = [
                'produto_id' => $request->produto_id,
                'fornecedor' => $request->fornecedor,
                'fabricante' => $request->fabricante,
                'nota_fiscal' => $request->nota_fiscal,
                'lote' => $request->lote, 
                'descricao_teste' => $request->descricao_teste,
                'insumo_liberado' => $request->insumo_liberado,
                'justificativa' => $request->justificativa
            ];
            $inspecao_recebidos->update($campos_inspecao);

            foreach ($request->resposta as $key => $value) {
                $respostas['inspecao_id'] = $resposta_lista_inspecao->id;
                $respostas['pergunta_id'] = $key;
                $respostas['resposta'] = $value;
                $resposta_lista_inspecao->update($respostas);
            }
        } else {
            $campos_inspecao = [
                'produto_id' => $request->produto_id,
                'fornecedor' => $request->fornecedor,
                'fabricante' => $request->fabricante,
                'nota_fiscal' => $request->nota_fiscal,
                'lote' => $request->lote, 
                'descricao_teste' => $request->descricao_teste,
                'insumo_liberado' => $request->insumo_liberado,
                'justificativa' => $request->justificativa
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
