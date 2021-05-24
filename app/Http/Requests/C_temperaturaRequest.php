<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class C_temperaturaRequest extends FormRequest
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
            'equipamento_id' => 'required',
            're_numero' => 'required',
            'dia' => 'required',
            'hora' => 'required',
            't_min' => 'required',
            't_atual' => 'required',
            't_max' => 'required'
        ];
    }


    public function messages()
    {
        return [
                'colaborador_id.required' => 'Nome do Colaborador é obrigatório!',
                'equipamento_id.required' => 'O equipamento  é obrigatório!',
                're_numero.required' => 'O número é obrigatório!',
                'hora.required' => 'Hora  é obrigatório!',
                't_min.required' => 'Temperatura mínima  é obrigatória!',
                't_atual.required' => 'Temperatura atual é obrigatório',
                't_max.required' => 'Temperatura máxima é obrigatório',
                'dia.required' => 'O dia é obrigatório'
        ];
    }
}
