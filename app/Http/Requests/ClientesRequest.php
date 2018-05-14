<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientesRequest extends FormRequest {

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
            'nome' => 'required|min:3|max:60',
            'sobrenome' => 'required|min:3|max:255',
            'documento' => 'required',
            'cidades_id' => 'required|integer',
            'tipo_documento' => 'required|size:1',
            'documento' => 'required',
            'email' => 'required|email',
            'celular' => 'required',
            'telefone' => 'required',
            'cep' => 'required',
            'logradouro' => 'required',
            'numero' => 'required',
            'complemento' => 'nullable',
            'bairro' => 'nullable',
            'status' => 'required'
        ];
    }
}

// End of file
