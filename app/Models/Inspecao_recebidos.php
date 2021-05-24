<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Equipamentos_Insumos;

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
        return $this->hasOne(Equipamentos_Insumos::class, 'id', 'produto_id');
    }
    public function resposta(){
        return $this->hasOne(Resposta_lista_inspecao::class, 'id', 'produto_id');
    }
}
