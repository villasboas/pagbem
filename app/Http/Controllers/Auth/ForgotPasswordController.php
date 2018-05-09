<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ForgotPasswordController extends Controller {

    /**
     * Exibe o formulario de esqueceu a senha
     *
     * @Get("/password/forgot")
     * @return void
     */
    function showForgotPasswordForm() {
        return view('@auth.pages.forgot', [ 'title' => 'Esqueci minha senha'  ]);
    }
}

// End of file
