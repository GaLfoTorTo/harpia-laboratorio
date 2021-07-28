<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Reclamacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'colaborador_id',
        'manifestacao',
        'data_abertura',
        'reclamante',
        'telefone',
        'email',
        'descricao',
        'tipo_nc',
        'n_acao_corretiva',
        'retorno',
        'solucao',
        'analise',
        'feedback',
        'rep_analise_id',
        'data_encerramento',
        'observacao'
    ]; 

    public function colaborador()
    {
        return $this->hasOne(Colaborador::class, 'id', 'colaborador_id');
    }
    public function rep_analise()
    {
        return $this->hasOne(Colaborador::class, 'id', 'rep_analise_id');
    }
}

