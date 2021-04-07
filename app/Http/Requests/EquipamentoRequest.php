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
                'equipamento_proprio' => 'required',
                'equipamento' => 'required',
                'modelo' => 'required',
                'manual' => 'required',
                'codigo' => 'required',
                'patrimonio' => 'required',
                'fabricante' => 'required',
                'fornecedor' => 'required'

                
        ];
    }

    public function messages()
    {
        return [
            'equipamento_proprio.required' => 'Escolha se o Equipamento é próprio ou não',
            'equipamento.required' => 'Informe o nome do Equipamento',
            'modelo.required' => 'Informe o modelo do equipamento',
            'manual.required' => 'Informe se tem o manual ou não',
            'codigo.required' => 'Informe o código do equipamento',
            'patrimonio.required' => 'Informe o patrimonio do equipamento',
            'fabricante.required' => 'Informe o fabricante do equipamento',
            'fornecedor.required' => 'Informe o fornecedor do equipamento'
        ];
    }
}
