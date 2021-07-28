<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroTreinamento extends Model
{
    use HasFactory;

    protected $table = 'registro_treinamento';
    protected $fillable = [

        'titulo',
        'carga_horaria',
        'data_inicial',
        'data_final',
        'conteudo'
    ]; 

   



}
