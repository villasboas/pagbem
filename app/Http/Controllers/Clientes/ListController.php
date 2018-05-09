<?php

namespace App\Http\Controllers\Clientes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListController extends Controller {

    /**
     *@Get("/clientes")
     *
     * @return void
     */
    function show() {
        return view('@clientes.pages.home', [ 'title' => 'Clientes' ]);
    }
}

// End of file
