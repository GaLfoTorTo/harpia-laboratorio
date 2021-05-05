<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReclamacoesRequest extends FormRequest
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
            'colaborador_id' => 'required',
            'data_abertura' => 'required',
            'rep_analise_id' => 'required',
            'descricao' => 'required',
            'n_registro' => 'required',
            'reclamante' => 'required'
        ];
    }

    public function messages()
    {
        return [
                'colaborador_id.required' => 'Nome do Colaboradore é obrigatório!',
                'data_abertura.required' => 'Data de abertura  é obrigatório!',
                'rep_analise_id.required' => 'Responsável pela análise é obrigatório!',
                'n_registro.required' => 'Número de registro  é obrigatório!',
                'descricao.required' => 'A descricação é obrigatória!',
                'reclamante.required' => 'O reclamante é obrigatório'
        ];
    }
}
