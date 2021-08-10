<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;
    protected $fillable = [
        'cargo',
        'tipo_formacao',
        'qualificacao',
        'xp_minima',
        'treinamentos',
        'habilidades',
        'con_tecnico',
        'descricao'
    ];

    public function responsabilidades() {
        return $this->hasMany(Rep::class, 'cargo_id');
    }
}
