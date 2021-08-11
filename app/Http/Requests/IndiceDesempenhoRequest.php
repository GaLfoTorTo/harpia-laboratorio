<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndiceDesempenhoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fornecedor_id'=>'required',
            'cnpj'=>'required',
            'ano_referencia'=>'required',
            'pedido_compra'=>'required',
            'data_entrega'=>'required',
            'pedidos_entregues'=>'required',
            'pedidos_entregues_atraso'=>'required',
            'pedidos_devolvidos'=>'required',
            'pedidos_nao_conforme'=>'required',
            'pontualidade'=>'required',
            'conformidade'=>'required',
            'calculo_idf'=>'required',
            'desempenho_fornecedor'=>'required'
        ];
    }
    
    public function messages()
    {
        return [
            'fornecedor_id.required' => 'O fornecedor é obrigatório',
            'cnpj.required' => 'O CNPJ é obrigatório',
            'ano_referencia.required' => 'O ano de referencia é obrigatório',
            'pedido_compra.required' => 'O pedido de compra é obrigatório',
            'data_entrega.required' => 'A data de entrega é obrigatório',
            'pedidos_entregues.required' => 'Os pedidos entregues é obrigatório',
            'pedidos_entregues_atraso.required' => 'Os pedidos entregues com atraso é obrigatório',
            'pedidos_devolvidos.required' => 'Os pedidos devolvidos é obrigatório',
            'pedidos_nao_conforme.required' => 'Os pedidos não conforme é obrigatório',
            'pontualidade.required' => 'A pontualidade é obrigatório',
            'conformidade.required' => 'A conformidade é obrigatório',
            'calculo_idf.required' => 'O calculo IDF é obrigatório',
            'desempenho_fornecedor.required' => 'O desempenho do fornecedor é obrigatório',

        ];
    }
}
