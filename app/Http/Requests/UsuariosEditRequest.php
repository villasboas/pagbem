<?php

namespace App\Http\Requests;

use App\Models\Usuarios;
use App\Rules\UniqueIfChanged;
use Illuminate\Foundation\Http\FormRequest;

class UsuariosEditRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {        
        return [
            'email' => [ 'email', 'required', new UniqueIfChanged(Usuarios::class, 'email', 'usuarios' ) ],
            'nome'  => 'required|max:30|min:2',
            'senha' => 'nullable|min:6|max:16|same:confirmacao_senha',
            'confirmacao_senha' => 'nullable|same:senha|min:6|max:16',
            'nivel_acesso' => 'required',
            'status' => 'required',
        ];
    }
}

// End of file
