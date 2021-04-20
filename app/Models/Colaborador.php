<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cpf',
        'email',
        'telefone',
        'cep',
        'logradouro',
        'bairro',
        'numero',
        'complemento',
        'cidade',
        'uf',
        'formacao',
        'funcao',
        'setores',
        'foto'
    ]; 
}
