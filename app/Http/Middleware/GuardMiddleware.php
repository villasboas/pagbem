<?php

namespace App\Http\Middleware;

use Closure;
use App\Core\Auth;

class GuardMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role = 'any' ){
        
        // Obtem o usuario logado, se existir
        $user          = Auth::user();
        $request->user = $user;
        
        // Verifica se é uma rota livre
        if ( $role == 'public' ) return $next($request);

        // Verifica se é uma rota não logado
        if ( $role == 'unlogged' && !$user ) return $next($request);

        // Verifica se existe um employee
        if ( !$user ) return redirect( 'login' );

        // Verifica se é uma rota para todos os grupos
        if ( $role == 'any' ) return $next($request);

        // Verifica o nivel de acesso
        if ( $role == $user->nivel_acesso ) return $next($request);
        dd( 'aqui');

        // Redireciona para o login, por padrão
        Auth::logout();
        return redirect( 'login' );
    }
}

// End of file
