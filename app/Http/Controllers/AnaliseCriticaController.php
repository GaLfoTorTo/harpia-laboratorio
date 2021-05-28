<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AnaliseCriticaRequest;
use App\Models\Analise_critica;
use App\Models\Colaborador;

class AnaliseCriticaController extends Controller
{

	public function index(Request $request) 
	{
		$pesquisa = $request->pesquisa;
		
		if($pesquisa != '') {
			$analise_criticas = Analise_critica::with('colaborador')
								->where('metodos_definidos', 'like', "%".$pesquisa."%")
								->orWhereHas('colaborador', function($query) use ($pesquisa){$query->where('nome','like', "%".$pesquisa."%");})
								->paginate(1000);
		} else {
			$analise_criticas = Analise_critica::
			with('colaborador')->paginate(10);
		}
		return view('analise_critica.index', compact('analise_criticas','pesquisa'));
	} 
	public function novo() {
		$colaboradores = Colaborador::select('id','nome')->get();
		return view('analise_critica.form', compact('colaboradores'));
	}
	public function editar($id) {
		$colaboradores = Colaborador::select('id','nome')->get();
		$analise_criticas = Analise_critica::find($id);
		return view('analise_critica.form', compact('analise_criticas','colaboradores'));
	}
	public function salvar(AnaliseCriticaRequest $request) {
		
	
		$ehValido = $request->validated();


		if($request->id != '') {
			$analise_critica = Analise_critica::find($request->id);
			$analise_critica->update($request->all());
		} else {
			$analise_critica = Analise_critica::create($request->all());
		}
		return redirect('/analise_critica/editar/'. $analise_critica->id)->with('success', 'Salvo com sucesso!');
	}
	public function deletar($id) {
		$analise_critica = Analise_critica::find($id);
		if(!empty($analise_critica)){
			$analise_critica->delete();
			return redirect('analise_critica')->with('success', 'Deletado com sucesso!');
		} else {
			return redirect('analise_critica')->with('danger', 'Registro não encontrado!');
		}
	}
}