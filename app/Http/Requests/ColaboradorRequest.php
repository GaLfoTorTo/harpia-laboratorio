<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ColaboradorRequest extends FormRequest
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
            'titulo' => 'required',
            'revisao_edicao_n' => 'required',
            'codigo' => 'required',
            'n_de_exemplares' => 'required',
            'localizacao' => 'required',
            'data_da_atualizacao' => 'required',
            'analise_critica_verificacao' => 'required',
            'atualizacao_em' => 'required'
    ];
    }

    public function messages()
    {
        return [
                'nome.required' => 'Nome do Colaboradore é obrigatório!',
                'email.required' => 'E-mail do Colaborador é obrigatório!',
                'cpf.required' => 'CPF do Colaborador é obrigatório!',
                'telefone.required' => 'telefone do Colaborador é obrigatório!',
        ];
    }
}
