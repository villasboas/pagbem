<?php

namespace App\Http\Controllers\Usuarios;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsuariosRequest;
use App\Http\Requests\UsuariosEditRequest;

/**
 * @Middleware("web")
 * 
 */
class SignupController extends Controller {

    /**
     * @Get("/usuarios/remover/{usuario}")
     *
     * @param Usuarios $usuario
     * @return void
     */
    function remove( Usuarios $usuario ) {
        try {

            // Remove um usuario
            $usuario->delete();

            // Volta para a pagina original
            return back()->with('success', 'Usuário removido com sucesso!');
        } catch( \Error $e ) {  

            // Volta a mensagem de erro
            return redirect('usuarios')->with( 'error', $e->getMessage() );
        }
    }

    /**
     * @Get("/usuarios/{usuarios}")
     *
     * @param Usuarios $usuarios
     * @return void
     */
    function showEditForm( Usuarios $usuarios ) {

        // Seta o flash na sessao
        session()->flash('usuarios', $usuarios);

        // Volta o index
        return $this->index();
    }

    /**
     * Cria um novo usuário
     *
     * @Post("/usuarios")
     * @param UsuariosRequest $request
     * @return void
     */
    function create( UsuariosRequest $request, Usuarios $usuario ) {
        
        // Cria o usuario e preenche com os dados enviados pelo POST
        $usuario->fill( $request->all() );

        // Salva o usuário
        if ( $usuario->save() ) {
            return back()->with('success', 'Usuário criado com sucesso!' );
        } else return back()->with('error', 'Erro ao cadastrar o usuário!');
    }

    /**
     * Realiza o update de um usuário
     *
     * @Post("/usuarios/{usuarios}")
     * @param UsuariosRequest $request
     * @return void
     */
    function store( UsuariosEditRequest $request, Usuarios $usuarios ) {

        // Preenche o usuário
        $usuarios->fill( removeIfNull( $request->all() ) );
        
        // Salva o usuário
        try {
            $usuarios->save();
            return back()->with('success', 'Usuário salvo com sucesso.' );
        } catch( \Error $e ) {
            return back()->with('error', $e->getMessage() );
        }
    }
}

// End of file