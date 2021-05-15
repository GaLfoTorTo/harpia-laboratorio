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
        'fornecedor_id',
        'fabricante',
        'nota_fiscal',
        'lote'
    ];
    public function fornecedor(){
        return $this->hasOne(Fornecedor::class, 'id', 'fornecedor_id');
    }

    public function produto(){
        return $this->belongsTo(Equipamentos_Insumos::class, 'produto_id','id');
    }

    public function respostas(){
        return $this->hasMany(Respostas_lista_inspecao::class, 'id', 'inspecao_id');
    }
}
