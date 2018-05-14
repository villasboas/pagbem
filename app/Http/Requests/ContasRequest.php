<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContasRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return user()->nivel_acesso == 'A';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'nome'                   => 'required|min:3|max:255',
            'bancos_id'              => 'required',
            'tipo_conta'             => 'required',
            'conta'                  => 'required|integer',
            'digito_conta'           => 'nullable|integer',
            'agencia'                => 'required|integer',
            'digito_agencia'         => 'nullable|integer',
            'titular'                => 'required|min:2|max:255',
            'tipo_documento_titular' => 'required',
            'documento_titular'      => 'required',
            'email_titular'          => 'required|email',
            'celular_titular'        => 'required',
            'status'                 => 'required'
        ];
    }
}

// End of file
