<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CobrancaRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'clientes_id' => 'required',
            'descricao' => 'required',
            'total' => 'required',
            'parcelas' => 'required',
            'vencimento_primeira_parcela' => 'required',
            'status' => 'required'
        ];
    }
}
