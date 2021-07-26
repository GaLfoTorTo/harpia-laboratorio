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
            'nome' => 'required',
            'email' => 'required',
            'cpf' => 'required',
            'telefone' => 'required',
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
