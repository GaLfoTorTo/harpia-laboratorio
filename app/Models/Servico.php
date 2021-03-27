<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;
    protected $fillable = [
        'descricao',
        'tipo_material',
        'tipo_servico',
        'servico_critico'
    ];
}
