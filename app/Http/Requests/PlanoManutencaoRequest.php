<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlanoManutencaoRequest extends FormRequest
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
            'codigo' => 'required',
            'equipamento_id' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'num_serie' => 'required',
            'area_trabalho' => 'required',
            'faixa_medicao' => 'required',
            'pontos_calibracao' => 'required',
            'ultima_calibracao' => 'required',
            'proxima_calibracao' => 'required',
            'ultima_manutencao' => 'required',
            'proxima_manutencao' => 'required',

        ];
    }
    public function messages()
    {
        return [
            'codigo.required' => 'O código do equipamento é obrigatório',
            'equipamento_id.required' => 'O equipamento é obrigatório',
            'marca.required' => 'A marca do equipamento é obrigatório!',
            'modelo.required' => 'O modelo do equipamento é obrigatório!',
            'num_serie.required' => 'O número de série do equipamento é obrigatório!',
            'area_trabalho.required' => 'A area de Trabalho do equipamento é obrigatório!',
            'faixa_medicao.required' => 'A faixa de medição é obrigatório!',
            'pontos_calibracao.required' => 'Os Pontos de calibragem são obrigatório!',
            'ultima_calibracao.required' => 'A data da ultima calibragem é obrigatório!',
            'proxima_calibracao.required' => 'A data da próxima calibragem é obrigatório!',
            'ultima_manutencao.required' => 'A data da ultima manutenção é obrigatório!',
            'proxima_manutencao.required' => 'A data da próxima manutenção é obrigatório!',
        ];
    }
}
