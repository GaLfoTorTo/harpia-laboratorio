<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fornecedor;

class Equipamentos_Insumos extends Model
{
    protected $table = 'equipamentos_insumos';

    use HasFactory;
    protected $fillable = [
        'equipamentos_insumos',
        'materiais',
        'nome',
        'codigo',
        'fabricante',
        'fornecedor_id',
        'produto_critico',
        'materiais_referencia',
        'desc_produto',
        'quantidade',
        'unidade'
    ];

    public function fornecedor(){
        return $this->hasOne(Fornecedor::class, 'id', 'fornecedor_id');
    }
}

