<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquipamentoRequest extends FormRequest
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
                'equipamento_proprio',
                'equipamento',
                'marca',
                'modelo',
                'tensao',
                'manual',
                'codigo',
                'num_serie',
                'localizacao_manual',
                'doc_instrucao',
                'patrimonio',
                'fabricante',
                'fornecedor',
                'localizacao_equipamento',
                'nome',
                'produto_critico',
                'materiais_referencia',
                'materiais',
                'desc_produto',
                'quantidade',
                'unidade'

                
        ];
    }

    public function messages()
    {
        return [
            
        ];
    }
}
