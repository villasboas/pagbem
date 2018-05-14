<?php

namespace App\Http\Controllers\Usuarios;

use App\Datatables\UsuariosDatatables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
