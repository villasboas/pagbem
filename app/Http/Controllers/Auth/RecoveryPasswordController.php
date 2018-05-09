<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecoveryPasswordController extends Controller {

    /**
     * Exibe o formulario de recuperacao de senha
     *
     * @Get("/password/recovery")
     * @return void
     */
    function showRecoveryForm() {
        return view('@auth.pages.recovery', [ 'title' => 'Recuperar senha' ] );
    }
}

// End of file
