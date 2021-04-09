<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class documentos_internos extends Model
{
    use HasFactory;

    protected $fillable = [
        'Tipo',
        'Codigo',
        'Titulo',
        'revisao_edicao',
        'data_aprovacao	',
        'num_copias',
        'localizacao',
        'documento'

    ];
}
