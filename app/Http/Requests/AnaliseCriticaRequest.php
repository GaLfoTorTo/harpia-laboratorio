<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnaliseCriticaRequest extends FormRequest
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
            'metodos_definidos' => 'required',
            'pessoal_qualificado' => 'required',
            'capacidade_recursos' => 'required',
            'metodo_ensaio' => 'required',
            'aprovado' => 'required',
            'justificativa_reprovacao' => 'required',
            'colaborador_id' => 'required',
            'data' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'metodos_definidos.required' => 'Este campo é obrigatório',
            'pessoal_qualificado.required' => 'Este campo é obrigatório',
            'capacidade_recursos.required' => 'Este campo é obrigatório',
            'metodo_ensaio.required' => 'Este campo é obrigatório',
            'aprovado.required' => 'Este campo é obrigatório',
            'justificativa_reprovacao.required' => 'Este campo é obrigatório',
            'colaborador_id.required' => 'Este campo é obrigatório',
            'data.required' => 'Este campo é obrigatório'
        ];
    }
}
