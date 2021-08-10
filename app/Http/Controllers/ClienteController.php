<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;

use PDF;

class ClienteController extends Controller
{
    public $tipos_unidade = ['Matriz', 'Filial'];

    public function index(Request $request) {
        $pesquisa = $request->pesquisa;
        $tipo = $request->tipo;

        if($tipo == 'exportar') {
            $d = date('d-m-Y-H-m-s');
            $arquivo = 'clientes-'.$d.'.xls';
            // Configurações header para forçar o download
            header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
            header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
            header ("Cache-Control: no-cache, must-revalidate");
            header ("Pragma: no-cache");
            //header ("Content-type: application/x-msexcel; charset=UTF-8");
            header ("Content-type: application/vnd.ms-excel; charset=UTF-8");
            header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
            header ("Content-Description: PHP Generated Data" );
            echo "\xEF\xBB\xBF"; //UTF-8 BOM

        }

        if($pesquisa != '' && $tipo != 'exportar') {
            $clientes = Cliente::where('nome', 'like', "%".$pesquisa."%")->paginate(1000);
        } else if($pesquisa != '' && $tipo == 'exportar') {
            $clientes = Cliente::where('nome', 'like', "%".$pesquisa."%")->all();
            return view('clientes.exportar', compact('clientes'));
        } else if($tipo == 'exportar') {
            $clientes = Cliente::all();
            return view('clientes.exportar', compact('clientes'));

        }else{
            $clientes = Cliente::paginate(10);
        }



        if($request->is('api/clientes')){
            return response()->json([$clientes],200);
        }else{
            return view('clientes.index', compact('clientes','pesquisa'));
        }
    } 
    public function exportar(Request $request) {
        $pesquisa = $request->pesquisa;
         
        $d = date('d-m-Y-H-m-s');
        $arquivo = 'clientes-'.$d.'.xls';
        // Configurações header para forçar o download
        header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
        header ("Cache-Control: no-cache, must-revalidate");
        header ("Pragma: no-cache");
        header ("Content-type: application/vnd.ms-excel; charset=UTF-8");
        header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
        header ("Content-Description: PHP Generated Data" );
        echo "\xEF\xBB\xBF";


        if($pesquisa != '') {
            $clientes = Cliente::where('nome', 'like', "%".$pesquisa."%")->get();
        } else  {
            $clientes = Cliente::all();
        }
        return view('clientes.exportar', compact('clientes'));
    } 
    public function exportar_pdf(Request $request) {
        $pesquisa = $request->pesquisa;
        
        if($pesquisa != '') {
            $clientes = Cliente::where('nome', 'like', "%".$pesquisa."%")->get();
        } else  {
            $clientes = Cliente::all();
        }
        
        view()->share('clientes', $clientes);

        // para visualizar antes
        //return view('clientes.pdf', compact('clientes'));

        $pdf_doc = PDF::loadView('clientes.exportar_pdf', $clientes);
        //para paisagem
        //$pdf_doc->setPaper('a4', 'landscape'); 
       
        //para download direto
        //return $pdf_doc->download('clientes.pdf');
        return $pdf_doc->stream('clientes.pdf');
    } 
    public function novo() {

        $tipos_unidade = $this->tipos_unidade;
        return view('clientes.form', compact('tipos_unidade'));
    }
    public function editar($id) {

        $cliente = Cliente::find($id);
        $tipos_unidade = $this->tipos_unidade;
        return view('clientes.form', compact('cliente', 'tipos_unidade'));
    }
    public function salvar(ClienteRequest $request) {

        $ehvalido = $request->validated();
        if($request->id != '') {
            $cliente = Cliente::find($request->id);
            $cliente->update($request->all());
        } else {
            $cliente = Cliente::create($request->all());
        }
        if($request->is('api/clientes/salvar')){
            return response()->json(['success' => 'Salvo com sucesso!'],200);
        }else{
            return redirect('/clientes/editar/'. $cliente->id)->with('success', 'Salvo com sucesso!');
        }
    }

    public function deletar(Request $request, $id) {
        $cliente = Cliente::find($id);
        
        //dd($request->is(`api/clientes/deletar/${id}`));
        if(!empty($cliente)){
            $cliente->delete();
            if($request->is(`api/clientes/deletar/${id}`)){
                return response()->json(['success' => 'Deletado com sucesso!'], 200);
            }else{
                return redirect('clientes')->with('success', 'Deletado com sucesso!');
            }
        } else {
            if($request->is(`api/clientes/deletar/${id}`)){
                return response()->json(['error' => 'Registro não encontrado!'], 404);
            }else{
                return redirect('clientes')->with('danger', 'Registro não encontrado!');
            }
        }
    }

    public function indexApp(Request $request) {
        $pesquisa = $request->pesquisa;

        if($pesquisa != '') {
            $clientes = Cliente::where('nome', 'like', "%".$pesquisa."%")->paginate(1000);
        } else {
            $clientes = Cliente::paginate(10);
        }
        return response()->json([$clientes],200);
    } 
}