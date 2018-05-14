<?php

namespace App\Http\Controllers\Cobrancas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * @Middleware("web")
 * 
 */
class ParcelasController extends Controller {

    /**
     *@Get("/parcelas" )
     *
     * @return void
     */
    function index() {
        return view('@cobrancas.pages.parcelas', [ 'title' => 'Parcelas' ] );
    }
}

// End of file
