<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class C_temperatura extends Model
{
    use HasFactory;
    protected $fillable = [
        'equipamento_id',
        're_numero',
        'mes_ano',
        'dia',
        'hora',
        'colaborador_id',
        't_min',
        't_atual',
        't_max',
        'observacoes',
        'decongela_dia',
        'd_colaborador_id',
        'limpeza_dia',
        'l_colaborador_id',
        'comprovacao_dia',
        'c_colaborador_id',
        'n_registro',
        'analise_critica',
        'observacao'
    ]; 

    public function colaborador()
    {
        return $this->hasOne(Colaborador::class, 'id', 'colaborador_id');
    }
    public function d_colaborador_id()
    {
        return $this->hasOne(Colaborador::class, 'id', 'd_colaborador_id');
    }
    public function l_colaborador_id()
    {
        return $this->hasOne(Colaborador::class, 'id', 'l_colaborador_id');
    }
    public function c_colaborador_id()
    {
        return $this->hasOne(Colaborador::class, 'id', 'c_colaborador_id');
    }
    public function equipamento_id()
    {
        return $this->hasOne(Equipamentos::class, 'id', 'equipamento_id');
    }
}
