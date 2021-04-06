<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fornecedor extends Model
{
    use HasFactory;

    
    protected $fillable = [

        'tipo',
        'cnpj',
        'razão_social',
        'nome_fantasia',
        'telefone',
        'email',
        'nome_do_contato',
        'cep',
        'logradouro',
        'número',
        'complemento',
        'bairro',
        'cidade',
        'estado'
    ]; 

   



}
