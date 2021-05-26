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
                'formacao' => 'required',
                'descricao' => 'required',
                'requisitos' => 'required',
                'treinamentos' => 'required'
                
        ];
    }

    public function messages()
    {
        return [
            'cargo.required' => 'O cargo é obrigatório',
            'formacao.required' => 'A formação é obrigatória',
            'descricao.required' => 'A descrição é obrigatória',
            'requisitos.required' => 'O requisito é obrigatório',
            'treinamentos.required' => 'O treinamentos é obrigatório'
            
        ];
    }
}
