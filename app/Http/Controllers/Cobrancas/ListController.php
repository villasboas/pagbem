<?php

namespace App\Http\Controllers\Cobrancas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * @Middleware("web")
 * 
 */
class ListController extends Controller {

    /**
     *@Get("cobrancas")
     *
     * @return void
     */
    function index() {
        return view('@cobrancas.pages.home', [ 'title' => 'Cobranças' ] );
    }
}

// End of file
