<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * @Middleware("web")
 * @Middleware("guard:any")
 * 
 */
class HomeController extends Controller {

    /**
     * @Get("/")
     *
     * @return void
     */
    function show() {
        return view('@dashboard.pages.home', [ 'title' => 'Inicio' ] );
    }
}

// End of file
