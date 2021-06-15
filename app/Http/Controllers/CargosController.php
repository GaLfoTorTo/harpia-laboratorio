<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CargosRequest;
use App\Models\Cargo;

class CargosController extends Controller
{   public $tipo_formacao = [' Ensino Fundamental', 'Ensino Médio', 'Graduação','Pós-Graduação'];

    public function index(Request $request) {
        $pesquisa = $request->pesquisa;

        if($pesquisa != '') {
            $cargos = Cargo::where('cargo', 'like', "%".$pesquisa."%")
            ->orWhere('tipo_formacao','like', "%".$pesquisa."%")
            ->orWhere('qualificacao','like', "%".$pesquisa."%")
            ->orWhere('habilidades','like', "%".$pesquisa."%")
            ->orWhere('treinamentos','like', "%".$pesquisa."%")
            ->orWhere('xp_minima','like', "%".$pesquisa."%")
            ->paginate(1000);
        } else {
            $cargos= Cargo::paginate(10);
        }
       

        return view('cargos.index', compact('cargos','pesquisa'));
    }

    public function novo() {
        $tipo_formacao = $this->tipo_formacao;
        return view('cargos.form', compact('tipo_formacao'));
    }

    public function salvar(CargosRequest $request) {
        $tipo_formacao = $this->tipo_formacao;
        $ehValido = $request->validated();
        $message = '';

        if($request->id == '') {
            $cargo = Cargo::create($request->all());
            $message = 'Salvo com sucesso';
        } else {
            $message = 'Alterado com sucesso'; 
            $cargo = Cargo::find($request->id);
            $cargo->update($request->all());
        }
        return redirect('cargos/editar/' . $cargo->id)->with('success', $message);
    } 
    public function editar($id) {
        $tipo_formacao = $this->tipo_formacao;
        $cargo = Cargo::find($id);
        $cargos = Cargo::select('id', 'cargo')->get();
        $cargo = Cargo::find($id);
        return view('cargos.form', compact('cargo', 'cargos','tipo_formacao')); 
    }
    public function deletar($id) {
        $cargo = Cargo::find($id);
        $cargo->delete();

        return redirect('cargos')->with('success', 'Deletado com sucesso!');
    }
}
