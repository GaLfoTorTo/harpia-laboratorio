<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParticipantesResquest extends FormRequest
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
            'setor' => 'required',
            'nome' => 'required',
            'assinatura' => 'required'
            
        ];
    }
    public function messages()
    {
        return [
            'numero.required' => 'O número é obrigatório',
            'setor.required' => 'O setor é obrigatório',
            'nome.required' => 'O nome é obrigatório ',
            'assinatura.required' => 'A assinatura é obrigatória'            
        ];
    }
}

