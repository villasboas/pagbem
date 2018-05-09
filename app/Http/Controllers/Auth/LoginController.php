<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller {

    /**
     * @Get("/login")
     *
     * @return void
     */
    function showLoginForm() {
        return view('@auth.pages.login', [ 'title' => 'Login' ] );
    }
}

// End of file