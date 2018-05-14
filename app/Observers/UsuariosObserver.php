<?php

namespace App\Observers;

use App\Models\Usuarios;

class UsuariosObserver {

    /**
     * Escuta ao evento de criação de usuario
     *
     * @param  \App\User  $user
     * @return void
     */
    public function creating(Usuarios $usuario ){
        $usuario->senha = bcrypt( $usuario->senha );
    }
}

// End of file
