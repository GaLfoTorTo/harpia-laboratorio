<?php

namespace App\Http\Controllers;

use App\Models\Colaborador;
use App\Models\Procedimento;
use App\Models\Equipamentos;
use App\Models\Servico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index() {

        $data['colaboradores'] = Colaborador::get()->count();
        $data['procedimentos'] = Procedimento::get()->count();
        $data['equipamentos'] = Equipamentos::get()->count();
        $data['servicos'] = Servico::get()->count();
        $data['analises_criticas'] = DB::select("SELECT DATE_FORMAT(data,'%M') as mes, MONTH(data) as mes_int, count(*) as total 
                                                FROM `analise_critica`
                                                WHERE YEAR(data) = YEAR(now())
                                                GROUP BY MONTH(data), 1, 2
                                                ORDER BY data");
    
        return view('layout.index', compact('data'));
    }
}
