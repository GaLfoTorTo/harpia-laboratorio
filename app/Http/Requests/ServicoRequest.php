<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicoRequest extends FormRequest
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
                'descricao' => 'required',
                'tipo_material' => 'required',
                'servico_critico' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'descricao.required' => 'A descrição é obrigatório',
            'tipo_material.required' => 'O tipo de material é obrigatório',
            'servico_critico.required' => 'Informe se o serviço é crítico ou não'
        ];
    }
}
