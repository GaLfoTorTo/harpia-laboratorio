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
            //'justificativa_reprovacao' => 'required',
            'colaborador_id' => 'required',
            'data' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'metodos_definidos.required' => 'Métodos definidos é obrigatório',
            'pessoal_qualificado.required' => 'Pessoal qualificado é obrigatório',
            'capacidade_recursos.required' => 'Capacidade de recursos é obrigatório',
            'metodo_ensaio.required' => 'Método de ensaio é obrigatório',
            'aprovado.required' => 'Aprovado ou não, é obrigatório',
            'colaborador_id.required' => 'Responsável é obrigatório',
            'data.required' => 'Data é obrigatório'
        ];
    }
}
