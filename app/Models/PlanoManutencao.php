<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Equipamentos;

class PlanoManutencao extends Model
{
    use HasFactory;
    protected $fillable = [
        'codigo',
        'equipamento_id',
        'equipamento',
        'marca',
        'modelo',
        'num_serie',
        'area_trabalho',
        'faixa_medicao',
        'pontos_calibracao',
        'ultima_calibracao',
        'proxima_calibracao',
        'ultima_manutencao',
        'proxima_manutencao',
        'documento'
    ];

    public function equipamentos(){
        return $this->hasOne(Equipamentos::class, 'id', 'equipamento_id');
    }
}
