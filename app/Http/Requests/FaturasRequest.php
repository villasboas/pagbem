<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FaturasRequest extends FormRequest {

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
            'conta_bancaria_id' => 'nullable',
            'valor' => 'required',
            'vencimento' => 'date|required',
            'status' => 'required',
            'nota_fiscal' => 'nullable'
        ];
    }
}

// End of file
