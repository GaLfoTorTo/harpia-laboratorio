<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EquipamentoController extends Controller
{
   public function index() {
       return view('equipamentos/index');
   }

   public function novo() {
    return view('equipamentos.form');
}
}
