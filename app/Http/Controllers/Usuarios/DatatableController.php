<?php

namespace App\Http\Controllers\Usuarios;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Datatables\UsuariosDatatables;

/**
 * @Middleware("web")
 * @Middleware("guard:A")
 * 
 */
class DatatableController extends Controller {

    /**
     * @Get("usuarios/datatables")
     *
     * @return void
     */
    function index() {
        return UsuariosDatatables::render();
    }
}

// End of file
