<?php

use App\Core\Auth;

/**
 * Obtem o usuário logado
 *
 * @return void
 */
function user() {
    return Auth::user();
}

/**
 * Verifica se o usuário está em um grupo
 *
 * @param [type] $role
 * @return boolean
 */
function is($role) {

    // Verifica se existe um usuario
    if ( !user() ) return false;

    // Transforma em array
    $roles = is_array( $role ) ? $role : [ $role ];

    // Verifica se existe o cargo desejado
    return ( in_array( user()->status, $roles ) ) ? true : false;
}

// End of file