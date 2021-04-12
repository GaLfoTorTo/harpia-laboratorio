<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class equipamentos_insumos extends Model
{
    use HasFactory;
    protected $fillable = [
        'equipamentos_insumos',
        'materiais',
        'nome',
        'codigo',
        'fabricante',
        'fornecedor',
        'produto_critico',
        'materiais_referencia',
        'desc_produto',
        'quantidade',
        'unidade'
    ];
}
