<?php

namespace App\Http\Controllers;

use App\Models\Colaborador;
use App\Models\Procedimento;
use App\Models\Equipamentos;
use App\Models\Servico;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {

        $data['colaboradores'] = Colaborador::get()->count();
        $data['procedimentos'] = Procedimento::get()->count();
        $data['equipamentos'] = Equipamentos::get()->count();
        $data['servicos'] = Servico::get()->count();

        return view('layout.index', compact('data'));
    }
}
