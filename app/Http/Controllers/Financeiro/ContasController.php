<?php

namespace App\Http\Controllers\Financeiro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * @Middleware("web")
 * 
 */
class ContasController extends Controller {
    
    /**
     *@Get("/contas")
     *
     * @return void
     */
    function index() {
        return view( '@contas.pages.home', [ 'title' => 'Contas Bancárias' ] );
    }
}
