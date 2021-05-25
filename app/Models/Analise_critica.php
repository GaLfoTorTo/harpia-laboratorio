<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Analise_critica extends Model
{
    use HasFactory;

    protected $table = 'analise_critica';
    protected $fillable = [

        'metodos_definidos',
        'pessoal_qualificado',
        'capacidade_recursos',
        'metodo_ensaio',
        'aprovado',
        'justificativa_reprovacao',
        'colaborador_id',
        'data'
    ]; 
    public function colaborador() {
        return $this->hasOne(Colaborador::class, 'id', 'colaborador_id');
    }
}
