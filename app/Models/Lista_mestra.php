<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Documento;

class Lista_mestra extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo',
        'documento_id',
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
        return $this->hasOne(Documento::class, 'id', 'documento_id');
    }
}
