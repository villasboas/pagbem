<?php

namespace App\Core;

use App\Models\Usuarios;

class Auth {

    /**
     * Obtem o usuário logado
     *
     * @return void
     */
    static function user() {
        
        // Verifica se existe um token na sessao
        $token = session()->get( '_session_token' );
        if ( !$token ) return null;

        // Obtem um usuario com o email e o token informado
        return Usuarios::where( 'codigo_sessao', $token )->first();
    }

    /**
     * Faz o logout
     *
     * @return void
     */
    static function logout() {
        session()->forget( '_session_token' );
    }
}

// End of file