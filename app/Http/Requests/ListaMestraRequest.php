<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListaMestraRequest extends FormRequest
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
               
                'tipo' => 'required',
                'codigo' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'tipo.required' => 'O tipo é obrigatório',
            'codigo.required' => 'O código é obrigatório'
        ];
    }
}
