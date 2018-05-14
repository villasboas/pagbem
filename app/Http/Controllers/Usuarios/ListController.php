<?php

namespace App\Http\Controllers\Usuarios;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * @Middleware("web")
 * 
 */
class ListController extends Controller {
    
    /**
     * @Get("/usuarios")
     *
     * @return void
     */
    function index() {

        // Obtem o builder do datatable
        $builder = \App\Datatables\UsuariosDatatables::builder('usuarios/datatables');

        // Retorna a view
        return view('@usuarios.pages.home',[
            'title' => 'Usuários',
            'builder' => $builder 
        ]);
    }
}

// End of file