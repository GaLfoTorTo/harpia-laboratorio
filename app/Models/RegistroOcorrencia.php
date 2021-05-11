<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroOcorrencia extends Model
{
    use HasFactory;

    protected $table = "registro_ocorrencia";

    protected $fillable = [
        'numero',
        'responsavel',
        'origem',
        'data_de_abertura',
        'identificacao_do_equipamento',
        'cod_equipamento',
        'descricao_da_ocorrencia',
        'necessario_correcao_imediata',
        'descrever_correcao',
        'ocorrencia_e_um_trabalho_NC',
        'registro_de_AC_n',
        'parecer_tecnico',
        'observacoes'
    ]; 
}
