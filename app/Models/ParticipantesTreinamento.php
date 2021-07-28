<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipantesTreinamento extends Model
{
    use HasFactory;

    protected $table = 'participantes_treinamento';
    protected $fillable = [
        'numero',
        'setor',
        'nome',
        'assinatura',
        'registro_treinamento_id'
    ]; 

   
    public function treinamento()
    {
        $this->belongsTo(ParticipantesTreinamento::class);
    }


}
