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
            'descricao' => 'required',
            'reclamante' => 'required',
            'manifestacao' => 'required',
            'n_registro' => 'required'
            
        ];
    }

    public function messages()
    {
        return [
                'colaborador_id.required' => 'Nome do Colaborador é obrigatório!',
                'data_abertura.required' => 'Data de abertura  é obrigatório!',
                'n_registro.required' => 'Número de registro  é obrigatório!',
                'descricao.required' => 'A descricação é obrigatória!',
                'reclamante.required' => 'O reclamante é obrigatório',
                'manifestacao.required' => 'Selecione um tipo de manifestação',
                
        ];
    }
}
