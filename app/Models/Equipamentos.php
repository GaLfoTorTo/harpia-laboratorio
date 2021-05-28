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
        'num_serie',
        'localizacao_manual',
        'doc_instrucao',
        'codigo',
        'patrimonio',
        'fabricante',
        'fornecedor_id',
        'localizacao_equipamento'
    ];

    public function fornecedor(){
        return $this->hasOne(Fornecedor::class, 'id', 'fornecedor_id');
    }

    public function setor(){
        return $this->hasOne(Setor::class, 'id', 'localizacao_equipamento');
    }
}
