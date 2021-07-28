<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CargosRequest extends FormRequest
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
                'cargo' => 'required',
                'tipo_formacao' => 'required',
                'qualificacao' => 'required',
                'xp_minima' => 'required',
                'habilidades' => 'required'
                
        ];
    }

    public function messages()
    {
        return [
            'cargo.required' => 'O cargo é obrigatório',
            'formacao.required' => 'A formação é obrigatória',
            'qualificacao.required' => 'A qualificação é obrigatória',
            'xp_minima.required' => 'A expêriencia mínima é obrigatória',
            'habilidades.required' => 'Habilidades é obrigatória'
            
        ];
    }
}
