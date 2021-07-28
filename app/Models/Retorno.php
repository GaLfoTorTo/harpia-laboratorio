<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retorno extends Model
{
    use HasFactory;

    protected $fillable = [
        'colaborador_id',
        'data_retorno',
        'descricao'
       
    ]; 


    public function colaborador()
    {
        return $this->hasOne(Colaborador::class, 'id', 'colaborador_id');
    }
    public function reclamacao()
    {
        return $this->hasOne(Reclamacao::class, 'id', 'reclamacao_id');
    }
}


