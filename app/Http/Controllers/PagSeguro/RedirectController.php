<?php

namespace App\Http\Controllers\PagSeguro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RedirectController extends Controller {

    /**
     * @Get("/pagseguro/redirect", as="pagseguro.redirect")
     *
     * @return void
     */
    function index() {
        return 'aqui';
    }
}

// End of file
