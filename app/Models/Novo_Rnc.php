<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Novo_Rnc extends Model
{
    use HasFactory;

    protected $table = 'novos_rncs';
    protected $fillable = [

        'codigo',
        'revisao',
        'numero',
        'data_abertura',
        'responsavel',
        'classificacao_acao',
        'origem',
        'identificacao',
        'doc_referencia',
        'requisito',
        'descricao',
        'necessario_analise',
        'analise_causa',
        'causa_raiz',
        'nc_consequencia',
        'relato_nc',
        'tratativa_eficaz',
        'relato_tratativa',
        'data_avaliacao',
        'risco_avaliado',
        'n_risco',
        'responsavel_encerramento',
        'data_responsavel',
        'observacoes'
    ]; 

    


}    