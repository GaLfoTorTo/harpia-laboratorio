<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentoRequest extends FormRequest
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
                'titulo',
                'revisao_edicao_n',
                'codigo',
                'n_de_exemplares',
                'localizacao',
                'data_da_atualizacao',
                'analise_critica_verificacao',
                'atualizacao_em',
                'n_de_exemplares',
                'documento',
                'tipo',
                'revisao_edicao',
                'data_aprovacao',
                'num_copias'
        ];
    }

    public function messages()
    {
        return [
            
        ];
    }
}