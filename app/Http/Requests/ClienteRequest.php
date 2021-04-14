<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
            'nome' => 'required',
            'cpf_cnpj' => 'required',
            'tipo_unidade' => 'required',
            'codigo_cliente' => 'required',
            'responsavel_tecnico' => 'required',
            'responsavel_financeiro' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'nome.required' => 'Nome do cliente é obrigatório',
            'cpf_cnpj.required' => 'CPF OU CNPJ do cliente é obrigatório',
            'tipo_unidade.required' => 'Nome da Unidade é obrigatório',
            'codigo_cliente.required' => 'Codigo do cliente nao foi gerado com sucesso!',
            'responsavel_tecnico.required' => 'Responsável tecnico é obrigatório',
            'responsavel_financeiro.required' => 'Responsável financeiro é obrigatório',
        ];
    }
}
