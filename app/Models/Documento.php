<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;

    protected $table = 'documento';
    protected $fillable = [
        'tipo_documento',
        'titulo',
        'revisao_edicao_n',
        'codigo',
        'localizacao',
        'data_da_atualizacao',
        'analise_critica_verificacao',
        'atualizacao_em',
        'n_de_exemplares',
        'documento',
        'tipo',
        'codigo',
        'titulo',
        'revisao_edicao',
        'data_aprovacao',
        'num_copias',
        'localizacao',
        'documento'
        
    ]; 

    
}