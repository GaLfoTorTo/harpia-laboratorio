<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perguntas_lista_inspecao extends Model
{
    use HasFactory;

    protected $table = 'pergunta_lista_inspecaos';

    protected $fillable = 
    [
        'pergunta'
    ];
}
