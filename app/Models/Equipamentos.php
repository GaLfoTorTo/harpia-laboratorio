<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fornecedor;
use App\Models\Setor;

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
        'codigo',
        'num_serie',
        'localizacao_manual',
        'doc_instrucao',
        'patrimonio',
        'fabricante',
        'fornecedor',
        'localizacao_equipamento',
        'nome',
        'produto_critico',
        'materiais_referencia',
        'materiais',
        'desc_produto',
        'quantidade',
        'unidade'

    ];

    public function fornecedor(){
        return $this->hasOne(Fornecedor::class, 'id', 'fornecedor_id');
    }

    public function setor(){
        return $this->hasOne(Setor::class, 'id', 'localizacao_equipamento');
    }
}
