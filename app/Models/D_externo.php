<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class D_externo extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'revisao_edicao_n',
        'codgo',
        'n_de_exemplares',
        'localizacao',
        'data_atualizacao',
        'analise_critica_verificacao',
        'atualizacao_em'
        
    ]; 

    
}