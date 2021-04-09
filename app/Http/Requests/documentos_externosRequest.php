<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class documentos_externosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
            'titulo.required' => 'O Titulo é obrigatório',
            'revisao_edicao_n.required' => 'A revisão/edição/N° é obrigatória',
            'codigo.required' => 'O codígo é obrigatório',
            'n_de_exemplares.required' => 'O número de exemplares é obrigatório',
            'localizacao.required' => 'A localização é obrigatória',
            'data_da_atualizacao.required' => 'A data de atualização é obrigatório',
            'analise_critica_verificacao.required' => 'A análise critica/verificação é obrigatória',
            'atualizacao_em.required' => 'A atualização é obrigatória'
        ];
    }
}
