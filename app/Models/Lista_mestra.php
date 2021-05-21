<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lista_mestra extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo',
        'codigo',
        'titulo',
        'revisao_n',
        'data_aprovacao',
        'n_copias',
        'localizacao',
        'data_analise',
        'atualizacao_em',
        'documento'
    ];

    public function documento_relacionado()
    {
        return $this->hasOne(Documentos_internos::class, 'codigo', 'codigo');
    }
}
