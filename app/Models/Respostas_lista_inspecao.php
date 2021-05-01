<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Fornecedor;
use App\Http\Models\Perguntas_lista_inspecao;

class Respostas_lista_inspecao extends Model
{
    use HasFactory;

    public $fillable= 
    [
        'resposta',
        'produto_id',
        'pergunta_id'
    ];

    public function fornecedor(){
        return $this->hasOne(Fornecedor::class, 'id', 'fornecedor_id');
    }

    public function pergunta(){
        return $this->hasOne(Perguntas_lista_inspecao::class, 'id', 'pergunta_id');
    }
}
