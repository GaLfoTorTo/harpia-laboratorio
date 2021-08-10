<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Responsa_autoRequest;
use App\Models\Responsa_auto;
use App\Models\Colaborador;
use App\Models\Cargo;

class Responsa_autoController extends Controller
{
    
    public function index(Request $request) {
        $colaboradores_id = Colaborador::select('nome', 'id')->get();
        $cargo_id = Cargo::select('cargo', 'id')->get();
        $pesquisa = $request->pesquisa;

        if($pesquisa != '') {
            $responsa_auto = Responsa_auto::with('colaborador','autorizador','cargo')
                                    ->where('assi_autorizado','like', "%".$pesquisa."%")
                                    ->orWhere('assi_autorizador','like', "%".$pesquisa."%")
                                    ->orWhereHas('colaborador', function($query) use ($pesquisa){
                                        $query->where('nome','like', "%".$pesquisa."%");
                                    })
                                    ->paginate(10);
        } else {
            $responsa_auto = Responsa_auto::with('colaborador')->paginate(10);
            
        }
        return view('responsa_auto.index', compact('responsa_auto','pesquisa','colaboradores_id','cargo_id'));
    } 
    public function novo() {
        $cargos = Cargo::select('cargo', 'id')->get();
        $autorizador_id = Colaborador::select('nome', 'id')->get();
        $colaboradores_id = Colaborador::select('nome', 'id')->get();

        return view('responsa_auto.form', compact('autorizador_id','colaboradores_id','cargos'));
    }
    public function editar($id) {
        $cargos = Cargo::select('cargo', 'id')->get();
        $autorizador_id = Colaborador::select('nome', 'id')->get();
        $colaboradores_id = Colaborador::select('nome', 'id')->get();
        $responsa_auto = Responsa_auto::find($id);
        
        return view('responsa_auto.form', compact('responsa_auto', 'autorizador_id', 'colaboradores_id','cargos'));
    }
    public function salvar(Responsa_autoRequest $request) {

        $ehvalido = $request->validated();
        if($request->id != '') {
            $responsa_auto = Responsa_auto::find($request->id);
            $responsa_auto->update($request->all());
        } else {
            
            $responsa_auto = Responsa_auto::create($request->all());
        }

        return redirect('/responsa_auto/editar/'. $responsa_auto->id)->with('success', 'Salvo com sucesso!');
    }
    public function deletar($id) {
        $responsa_auto = Responsa_auto::find($id);
        if(!empty($responsa_auto)){
            $responsa_auto->delete();
            return redirect('responsa_auto')->with('success', 'Deletado com sucesso!');
        } else {
            return redirect('responsa_auto')->with('danger', 'Registro não encontrado!');
        }
    }
}
