<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cpf_cnpj',
        'email',
        'telefone',
        'cep',
        'logradouro',
        'bairro',
        'numero',
        'complemento',
        'cidade',
        'uf',
        'tipo_unidade',
        'codigo_cliente',
        'responsavel_tecnico',
        'responsavel_financeiro'
    ]; 
    
}
