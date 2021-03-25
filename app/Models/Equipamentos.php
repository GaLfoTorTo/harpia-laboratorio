<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipamentos extends Model
{
    use HasFactory;

    protected $fillable = [
        'equipamento_proprio',
        'equipamento',
        'marca',
        'modelo',
        'tensao',
        'manual',
        'num_serie',
        'localizacao_manual',
        'doc_instrucao',
        'codigo',
        'patrimonio',
        'fabricante',
        'fornecedor',
        'localizacao_equipamento'
    ];
}
