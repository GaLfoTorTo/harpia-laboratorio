<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NovoRncRequest extends FormRequest
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
            'numero' => 'required',
            'data_abertura' => 'required',
            'responsavel' => 'required',
            'classificacao_acao' => 'required',
            'origem' => 'required',
            'doc_referencia' => 'required',
            'necessario_analise' => 'required',
            'nc_consequencia' => 'required',
            'tratativa_eficaz' => 'required',
            'risco_avaliado' => 'required',
            'responsavel_encerramento' => 'required'
            
            
        ];
    }
    public function messages()
    {
        return [
            'numero.required' => 'O numero é obrigatório',
            'data_abertura.required' => 'A Data de Abertura é obrigatória',   
            'responsavel.required' => 'O nome do responsável é obrigatório',  
            'classificacao_acao.required' => 'A Classificação da Ação é obrigatória',  
            'origem.required' => 'A Origem é obrigatória',  
            'doc_referencia.required' => 'O Documento de Referência é obrigatório',  
            'necessario_analise.required' => 'Necessário Análise é obrigatório',  
            'nc_consequencia.required' => 'A NC gerou consequência é obrigatório',  
            'tratativa_eficaz.required' => 'A Tratativa é obrigatória',          
            'risco_avaliado.required' => 'O Risco Avaliado é obrigatório',  
            'responsavel_encerramento.required' => 'O responsável pelo encerramento é obrigatório'
        ];
    }
}
