<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Inspecao_recebidos;
use App\Http\Models\Perguntas_lista_inspecao;

class Respostas_lista_inspecao extends Model
{
    use HasFactory;

    protected $table = 'resposta_lista_inspecaos';
    protected $fillable= 
    [
        'resposta',
        'inspecao_id',
        'pergunta_id'
    ];

    public function inspecaoRecebido(){
        return $this->hasOne(Inspecao_recebidos::class, 'id', 'inspecao_id');
    }

    public function pergunta(){
        return $this->hasOne(Perguntas_lista_inspecao::class, 'id', 'pergunta_id');
    }
}
