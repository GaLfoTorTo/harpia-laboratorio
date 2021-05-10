<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Fornecedor;

class Inspecao_recebidos extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'produto',
        'fornecedor_id',
        'fabricante',
        'nota_fiscal',
        'lote'
    ];
    public function fornecedor(){
        return $this->hasOne(Fornecedor::class, 'id', 'fornecedor_id');
    }
}
