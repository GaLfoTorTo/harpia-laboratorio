<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CargosRequest;
use App\Models\Cargo;

class CargosController extends Controller
{
    public function index(Request $request) {
        $pesquisa = $request->pesquisa;

        if($pesquisa != '') {
            $cargos = Cargo::where('cargo', 'like', "%".$pesquisa."%")
            ->orWhere('formacao','like', "%".$pesquisa."%")
            ->orWhere('descricao','like', "%".$pesquisa."%")
            ->orWhere('formacao','like', "%".$pesquisa."%")
            ->orWhere('treinamentos','like', "%".$pesquisa."%")
            ->orWhere('requisitos','like', "%".$pesquisa."%")
            ->paginate(1000);
        } else {
            $cargos= Cargo::paginate(10);
        }
       

        return view('cargos.index', compact('cargos','pesquisa'));
    }

    public function novo() {
       
        return view('cargos.form');
    }

    public function salvar(CargosRequest $request) {

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
        $cargo = Cargo::find($id);
        $cargos = Cargo::select('id', 'cargo')->get();
        $cargo = Cargo::find($id);
        return view('cargos.form', compact('cargo', 'cargos')); 
    }
    public function deletar($id) {
        $cargo = Cargo::find($id);
        $cargo->delete();

        return redirect('cargos')->with('success', 'Deletado com sucesso!');
    }
}
