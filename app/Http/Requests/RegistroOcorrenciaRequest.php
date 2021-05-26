<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistroOcorrenciasRequest extends FormRequest
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
        'responsavel' => 'required',
        'origem' => 'required',
        'data_de_abertura' => 'required',
        'identificacao_do_equipamento' => 'required',
        'cod_equipamento' => 'required',
        'descricao_da_ocorrencia' => 'required',
        'necessario_correcao_imediata' => 'required',
        'descrever_correcao' => 'required',
        'ocorrencia_e_um_trabalho_NC' => 'required',
        'registro_de_AC_n' => 'required',
        'parecer_tecnico' => 'required',
        'observacoes' => 'required',
  
            
        ];
    }
    public function messages()
    {
        return [

        'numero'=> 'O número é obrigatório',
        'responsavel'=> 'O número é obrigatório',
        'origem'=> 'O número é obrigatório',
        'data_de_abertura'=> 'O número é obrigatório',
        'identificacao_do_equipamento'=> 'O número é obrigatório',
        'cod_equipamento'=> 'O número é obrigatório',
        'descricao_da_ocorrencia'=> 'O número é obrigatório',
        'necessario_correcao_imediata'=> 'O número é obrigatório',
        'descrever_correcao'=> 'O número é obrigatório',
        'ocorrencia_e_um_trabalho_NC'=> 'O número é obrigatório',
        'registro_de_AC_n'=> 'O número é obrigatório',
        'parecer_tecnico'=> 'O número é obrigatório',
        'observacoes'=> 'O número é obrigatório',

                      
        ];
    }
}
