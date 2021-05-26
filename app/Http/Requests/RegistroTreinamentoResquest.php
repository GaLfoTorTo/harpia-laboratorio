<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistroTreinamentoRequest extends FormRequest
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
            'titulo' => 'required',
            'carga_horaria' => 'required',
            'data' => 'required',
            'conteudo' => 'required'
            
        ];
    }
    public function messages()
    {
        return [
            'titulo.required' => 'O título é obrigatório',
            'carga_horaria.required' => 'A Crga Horária é obrigatória',
            'data.required' => 'A data é obrigatório ',
            'conteudo' => 'O Conteúdo é obrigatório'            
        ];
    }
}
