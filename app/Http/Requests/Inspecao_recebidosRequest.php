<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Inspecao_recebidosRequest extends FormRequest
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
            'fornecedor' => 'required',
            'fabricante' => 'required',
            'nota_fiscal' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'fornecedor.required' => 'Nome do fornecedor é obrigatório',
            'fabricante.required' => 'Nome do fabricante é obrigatório',
            'nota_fiscal.required' => 'Número da nota fiscal é obrigatório!',
        ];
    }
}
