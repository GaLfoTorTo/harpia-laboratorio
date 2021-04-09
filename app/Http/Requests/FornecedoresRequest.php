<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FornecedoresRequest extends FormRequest
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
            'tipo' => 'required',
            'cnpj' => 'required',
            'razao_social' => 'required',
            'telefone' => 'required',
            'email' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'tipo.required' => 'O tipo é obrigatório',
            'cnpj.required' => 'O cnpj é obrigatório',
            'razao_social.required' => 'Informe o nome em Razão social ',
            'telefone.required' => 'O telefone é obrigatório',
            'email.required' => 'O email é obrigatório'
        ];
    }
}

