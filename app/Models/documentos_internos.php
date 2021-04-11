<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentos_internos extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo',
        'codigo',
        'titulo',
        'revisao_edicao',
        'data_aprovacao	',
        'num_copias',
        'localizacao',
        'documento'

    ];
}
