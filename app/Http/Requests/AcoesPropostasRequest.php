<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AcoesPropostasRequest extends FormRequest
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
            'acao' => 'required',
            'responsavel' => 'required',
            'prazo' => 'required',
            'prazo_final' => 'required',
            'necessario_prorrogacao' => 'required',
            'data_encerramento' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'acao.required' => 'A Ação é obrigatória',
            'responsavel.required' => 'O Responsável é obrigatório',
            'prazo.required' => 'O prazo é obrigatório',
            'prazo_final.required' => 'O Prazo Final é obrigatório',   
            'necessario_prorrogacao.required' => 'Necessário Prorrogacão é obrigatório',  
            'data_encerramento.required' => 'A Data de Encerramento é obrigatória'  
        ];
}

}