<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use App\Http\Models\Equipamentos_Insumos;
=======
use App\Models\Fornecedor;
use App\Models\Equipamentos_Insumos;
use App\Models\Respostas_lista_inspecao;
>>>>>>> 28d920a187d56c4018474835ac2699507944170b

class Inspecao_recebidos extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'produto_id',
<<<<<<< HEAD
        'fornecedor',
=======
        'fornecedor_id',
>>>>>>> 28d920a187d56c4018474835ac2699507944170b
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

    public function produto(){
        return $this->belongsTo(Equipamentos_Insumos::class, 'produto_id','id');
    }

    public function respostas(){
        return $this->hasMany(Respostas_lista_inspecao::class, 'id', 'inspecao_id');
    }
}
