<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\C_temperaturaRequest;
use App\Models\C_temperatura;
use App\Models\Colaborador;
use App\Models\Equipamentos;

class C_temperaturaController extends Controller
{

    public function index(Request $request) {
        $colaboradores_id = Colaborador::select('nome', 'id')->get();
        $refrigerador = Equipamentos::select('equipamento', 'id')->get();
        $d_colaboradores_id = Colaborador::select('nome', 'id')->get();
        $pesquisa = $request->pesquisa;

        if($pesquisa != '') {
            $c_temperaturas = C_temperatura::with('colaborador', 'd_colaborador_id', 'l_colaborador_id', 'c_colaborador_id', 'equipamento_id')
                                    ->where('dia','like', "%".$pesquisa."%")
                                    ->orWhere('hora','like', "%".$pesquisa."%")
                                    ->orWhere('observacoes','like', "%".$pesquisa."%")
                                    ->orWhereHas('colaborador', function($query) use ($pesquisa){
                                        $query->where('nome','like', "%".$pesquisa."%");
                                    })
                                    ->paginate(1000);
        } else {
            $c_temperaturas = C_temperatura::with('colaborador', 'd_colaborador_id', 'l_colaborador_id','c_colaborador_id', 'equipamento_id')->paginate(10);
            
        }
        return view('c_temperatura.index', compact('c_temperaturas','pesquisa','colaboradores_id', 'refrigerador'));
    } 
    public function novo() {
        $colaboradores_id = Colaborador::select('nome', 'id')->get();
        $d_colaboradores_id = Colaborador::select('nome', 'id')->get();
        $l_colaboradores_id = Colaborador::select('nome', 'id')->get();
        $c_colaboradores_id = Colaborador::select('nome', 'id')->get();
        $refrigerador = Equipamentos::select('equipamento', 'id')->get();

        return view('c_temperatura.form', compact('d_colaboradores_id', 'l_colaboradores_id','c_colaboradores_id','colaboradores_id','refrigerador'));
    }
    public function editar($id) {
        $colaboradores_id = Colaborador::select('nome', 'id')->get();
        $d_colaboradores_id = Colaborador::select('nome', 'id')->get();
        $l_colaboradores_id = Colaborador::select('nome', 'id')->get();
        $c_colaboradores_id = Colaborador::select('nome', 'id')->get();
        $refrigerador = Equipamentos::select('equipamento', 'id')->get();
        $colaboradores_id = Colaborador::select('nome', 'id')->get();

        $c_temperaturas = C_temperatura::find($id);
       
      
        return view('c_temperatura.form', compact('d_colaboradores_id', 'l_colaboradores_id','c_colaboradores_id','colaboradores_id','refrigerador', 'c_temperaturas'));
    }
    public function salvar(C_temperaturaRequest $request) {

        $ehvalido = $request->validated();
        if($request->id != '') {
            $c_temperatura = C_temperatura::find($request->id);
            $c_temperatura->update($request->all());
        } else {
            $c_temperatura = C_temperatura::create($request->all());
        }

        return redirect('/c_temperatura/editar/'. $c_temperatura->id)->with('success', 'Salvo com sucesso!');
    }
    public function deletar($id) {
        $c_temperatura = C_temperatura::find($id);
        if(!empty($c_temperatura)){
            $c_temperatura->delete();
            return redirect('c_temperatura')->with('success', 'Deletado com sucesso!');
        } else {
            return redirect('c_temperatura')->with('danger', 'Registro não encontrado!');
        }
    }
}
