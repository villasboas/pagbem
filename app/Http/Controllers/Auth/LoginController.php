<?php

namespace App\Http\Controllers\Auth;

use App\Core\Auth;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;

/**
 * @Middleware("web")
 * 
 */
class LoginController extends Controller {

    /**
     * @Get("/login")
     * @Middleware("guard:unlogged")
     * @return void
     */
    function showLoginForm() {
        return view('@auth.pages.login', [ 'title' => 'Login' ] );
    }

    /**
     * @Post("login")
     * @Middleware("guard:unlogged")
     * @return void
     */
    function doLogin( LoginRequest $request ) {
        try {

            // Tenta fazer o login
            Usuarios::doLogin( $request->email, $request->senha );

            // Redireciona para a home
            return redirect( '/' );

        } catch( \Error $e ) {
            return back()->with( 'error', $e->getMessage() );
        }
    }

    /**
     * Faz o logout
     *
     * @Get("logout")
     * @Middleware("guard:any")
     * @return void
     */
    function doLogout() {
        Auth::logout();
        return redirect( 'login' );
    }
}

// End of file