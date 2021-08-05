<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsa_auto extends Model
{
    use HasFactory;
    protected $fillable = [
        'colaborador_id',
        'autorizado_id',
        'assi_autorizado',
        'assi_autorizador',
        'cargo_id',
    ];


    public function colaborador()
    {
        return $this->hasOne(Colaborador::class, 'id', 'colaborador_id');
    }

    public function autorizador()
    {
        return $this->hasOne(Colaborador::class, 'id', 'autorizado_id');
    }
    public function cargo()
    {
        return $this->hasOne(Colaborador::class, 'id', 'cargo_id');
    }
}
