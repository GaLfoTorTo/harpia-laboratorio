<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fornecedor;

class IndiceDesempenho extends Model
{
    use HasFactory;

    protected $fillable = [
        'fornecedor_id',
        'cnpj',
        'fornecedor',
        'ano_referencia',
        'pedido_compra',
        'data_entrega',
        'pedidos_entregues',
        'pedidos_entregues_atraso',
        'pedidos_devolvidos',
        'pedidos_nao_conforme',
        'pontualidade',
        'conformidade',
        'calculo_idf',
        'desempenho_fornecedor'
    ];

    public function fornecedores(){
        return $this->hasOne(Fornecedor::class, 'id', 'fornecedor_id');
    }
}
