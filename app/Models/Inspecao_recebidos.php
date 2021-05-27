<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fornecedor;
use App\Models\Equipamentos_Insumos;
use App\Models\Respostas_lista_inspecao;

class Inspecao_recebidos extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'produto_id',
        'fornecedor',
        'fabricante',
        'nota_fiscal',
        'lote',
        'descricao_teste',
        'insumo_liberado',
        'justificativa'
    ];

    public function produto(){
        return $this->belongsTo(Equipamentos_Insumos::class, 'produto_id','id');
    }

    public function respostas(){
        return $this->hasMany(Respostas_lista_inspecao::class, 'id', 'inspecao_id');
    }
}
